<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-24
 * Time: 21:36
 */

namespace PhoenyxStudio\Downloader;

use PhoenyxStudio\Downloader\Exception\RedirectException;
use PhoenyxStudio\Downloader\Exception\CurlErrorException;
use PhoenyxStudio\Downloader\Exception\BlankPageException;

class CurlDownloader implements IDownloader
{
    public function download(string $url): string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException();
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode == 301 || $httpCode == 302) {
            throw new RedirectException();
        }

        if (empty($result) && $httpCode == 200) {
            throw new BlankPageException();
        }

        curl_close($curl);

        return $result;
    }
}