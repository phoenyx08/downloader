<?php

namespace PhoenyxStudio\Downloader;

/**
 * Interface IDownloader.
 *
 * Provides methods due to implement in downloader classes
 *
 * @package PhoenyxStudio\Downloader
 */
interface IDownloader
{
    /**
     * Main function in a class implementing Downloader interface.
     *
     * Function accepting url and returning html-source of the page located at the url
     *
     * @param string $url Pass this Url to get some html
     * @return string If it's all right source-code of the page at $url returned here
     */
    public function download(string $url) : string;
}