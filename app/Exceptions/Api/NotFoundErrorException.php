<?php

namespace App\Exceptions\Api;

use Exception;

class NotFoundErrorException extends Exception
{
    public function __construct($message = null, $code = null)
    {
        if (!$code) {
            $code = config('settings.exceptions.code');
        }

        parent::__construct($message, $code, null);
    }
}
