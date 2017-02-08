<?php

namespace App\Exceptions\Api;

use Exception;

abstract class ApiException extends Exception
{
    protected $data = [];

    protected $messageTerminated;

    protected $choice;

    public function __construct($data = [], $message = 'api_exception', $choice = false, $code = null)
    {
        if (!$code) {
            $code = config('settings.exceptions.code');
        }

        $this->choice = $choice;
        $this->data = array_merge($this->data, $data);
        $this->messageTerminated = $this->translate($message);

        parent::__construct($this->translate($message), $code, null);
    }

    protected function translate($message)
    {
        $lang = implode('.', ['exceptions.api', $message]);

        if ($this->choice !== false) {
            return trans_choice($lang, $this->choice, $this->data);
        }

        return trans($lang, $this->data);
    }

    public function getMessageTerminated()
    {
        return $this->messageTerminated;
    }

    public function getData($key = null)
    {
        return (!$key || !isset($this->data[$key])) ? false : $this->data[$key];
    }

    public function getChoice()
    {
        return $this->choice;
    }
}
