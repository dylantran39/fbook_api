<?php

namespace App\Exceptions\Api;

class NotOwnerException extends ApiException
{
    public function __construct($data = [], $message = 'not_owner')
    {
        parent::__construct($data, $message);
    }
}
