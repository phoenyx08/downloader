<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-23
 * Time: 22:55
 */
use PHPUnit\Framework\TestCase;
use PhoenyxStudio\Downloader\IDownloader;
use PhoenyxStudio\Downloader\FakeDownloader;

class FakeDownloaderTest extends TestCase
{
    /**
     * Test that constructor of FakeDownloader class returns instance of IDownloader::interface
     */
    public function testConstructorReturnsObjectImplementingIdownloaderInterface(): void
    {
        $this->assertInstanceOf(
            IDownloader::class,
            new FakeDownloader()
        );
    }
    /**
     * Test that constructor of FakeDownloader class returns instance of FakeDownloader::class
     */
    public function testConstructorReturnsInstanceOfFakeDownloaderClass(): void
    {
        $this->assertInstanceOf(
          FakeDownloader::class,
            new FakeDownloader()
        );
    }

    /**
     * Test that download method returns string
     */
    public function testDownloadMethodReturnsString(): void
    {
        $downloader = new FakeDownloader();
        $this->assertIsString($downloader->download('http://google.com/'),
            'Download method has not returned string'
        );
    }
}