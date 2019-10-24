<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-24
 * Time: 21:36
 */

namespace PhoenyxStudio\Downloader;


class CurlDownloader implements IDownloader
{
    public function download(string $url): string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);

        if (empty($result)) {
            throw new \Exception('Downloader returned empty string');
        }

        return $result;
    }
}