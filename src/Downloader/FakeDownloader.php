<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-17
 * Time: 22:30
 */

namespace PhoenyxStudio\Downloader;

/**
 * Used for development purposes.
 *
 * This class accepts arbitrary string and always returns the same html-markup. It simulates behavior of a class
 * which downloads some html from some location. The class might be needed when a developer does not wish to generate
 * network traffic and just trying to test some code over result provided by the downloader
 *
 * @package PhoenyxStudio\Downloader
 */
class FakeDownloader implements IDownloader
{
    /**
     * Downloads html-source of a webpage.
     *
     * Just returns the same html for any input argument in case of FakeDownloader
     *
     * @param string $url Url of the webpage for which we want to get html-source (in general case, in case of
     * FakeDownloader can accept any string)
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


