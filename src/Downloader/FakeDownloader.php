<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-17
 * Time: 22:30
 */

namespace PhoenyxStudio\Downloader;

class FakeDownloader implements IDownloader
{
    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string
    {
        return '<!DOCTYPE html>'.PHP_EOL.
                '<html>'.PHP_EOL.
                 '<head>'.PHP_EOL.
                  '<title>Title of the document</title>'.PHP_EOL.
                 '</head>'.PHP_EOL.
                 '<body>'.PHP_EOL.
                  '<p>The content of the document......</p>'.PHP_EOL.
                  '<p>Source request: ' . $url . '</p>'.PHP_EOL.
                 '</body>'.PHP_EOL.
                '</html>';
    }

}


