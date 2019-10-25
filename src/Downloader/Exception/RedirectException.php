<?php
/**
 * Created by PhpStorm.
 * User: phoenyx
 * Date: 2019-10-25
 * Time: 23:52
 */

namespace PhoenyxStudio\Downloader\Exception;

class RedirectException extends \Exception
{
    public function __construct(string $message = "Unable to download from source due to redirect.",
                                int $code = 0,
                                Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}