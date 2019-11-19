<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-11-19
 * Time: 22:16
 */

namespace PhoenyxStudio\Downloader\Exception;

class BlankPageException extends \Exception
{
    public function __construct(string $message = "Download URL returned status 200 but the page is blank",
                                int $code = 0,
                                Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}