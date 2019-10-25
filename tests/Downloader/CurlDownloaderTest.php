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
        $this->assertIsString($downloader->download('http://www.google.com/'),
            'Download method has not returned string'
        );
    }

    /**
     * Test that download method throws exception if Url is incorrect
     * @throws Exception
     */
    public function testDownloadMethodThrowsExceptionIfUrlIncorrect(): void
    {
        $downloader = new CurlDownloader();
        $this->expectException(\Exception::class);
        $downloader->download('htt://google.com/');
    }
}