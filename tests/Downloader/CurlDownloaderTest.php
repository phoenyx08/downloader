<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-24
 * Time: 21:47
 */

use PHPUnit\Framework\TestCase;
use PhoenyxStudio\Downloader\IDownloader;
use PhoenyxStudio\Downloader\CurlDownloader;
use PhoenyxStudio\Downloader\Exception\RedirectException;
use PhoenyxStudio\Downloader\Exception\CurlErrorException;

class CurlDownloaderTest extends TestCase
{
    /**
     * Test that constructor of CurlDownloader class returns instance of IDownloader::interface
     */
    public function testConstructorReturnsObjectImplementingIdownloaderInterface(): void
    {
        $this->assertInstanceOf(
            IDownloader::class,
            new CurlDownloader()
        );
    }
    /**
     * Test that constructor of CurlDownloader class returns instance of CurlDownloader::class
     */
    public function testConstructorReturnsInstanceOfCurlDownloaderClass(): void
    {
        $this->assertInstanceOf(
            CurlDownloader::class,
            new CurlDownloader()
        );
    }

    /**
     * Test that download method returns string
     */
    public function testDownloadMethodReturnsString(): void
    {
        $downloader = new CurlDownloader();
        $this->assertIsString($downloader->download('http://testpoints.phoenyx-studio.pp.ua/blank-page.php'),
            'Download method has not returned string'
        );
    }

    /**
     * Test that download method throws exception if Url is incorrect
     * @throws Exception
     */
    public function testDownloadMethodThrowsCurlErrorExceptionIfUrlIncorrect(): void
    {
        $downloader = new CurlDownloader();
        $this->expectException(CurlErrorException::class);
        $downloader->download('htt://google.com/');
    }

    /**
     * Test that download method throws RedirectException if we request an Url
     * which exactly returns 301 or 302 redirect
     * @throws CurlErrorException
     * @throws RedirectException
     */
    public function testDownloadMethodThrowsRedirectExceptionIfRedirectableUrlQueried(): void
    {
        $downloader = new CurlDownloader();
        $this->expectException(RedirectException::class);
        $downloader->download('http://testpoints.phoenyx-studio.pp.ua/redirect-301-source.php');
    }

    /**
     * Test that in case of blank page with status 200 we get an \Exception
     * @throws CurlErrorException
     * @throws RedirectException
     */
    public function testDownloadMethodThrowsExceptionIfEmptyResponseReturned(): void
    {
        $downloader = new CurlDownloader();
        $this->expectException(\Exception::class);
        $downloader->download('htt://google.com'); // @todo the test in fact incorrect because we intend to
        // get empty page with response status 200. Using incorrect url here will lead to CurlErrorException not
        // to \Exception. Need to find and use here some url which fits requirements.
    }
}