<?php

namespace App\Exceptions\Api;

class NotFoundException extends ApiException
{
    public function __construct($data = [], $message = 'not_found')
    {
        parent::__construct($data, $message);
    }
}
