<?php

namespace PhoenyxStudio\Downloader;

interface IDownloader
{
    public function download(string $url) : string;
}