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
use PhoenyxStudio\Downloader\Exception\BlankPageException;

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
        $this->assertIsString($downloader->download('http://testpoints.phoenyx-studio.pp.ua/redirect-301-target.php'),
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
     * Test that download method throws BlankPageException if we receive blank page with status 200
     * @throws CurlErrorException
     * @throws RedirectException
     */
    public function testDownloadMethodThrowsExceptionIfEmptyResponseReturned(): void
    {
        $downloader = new CurlDownloader();
        $this->expectException(BlankPageException::class);
        $downloader->download('http://testpoints.phoenyx-studio.pp.ua/blank-page.php');
    }
}