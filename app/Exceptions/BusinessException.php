<?php

namespace App\Exceptions;

use Exception;

class BusinessException extends Exception
{
    private string $userMessage;

    public function __construct(string $userMessage)
    {
        $this->userMessage = $userMessage;
        parent::__construct($userMessage);
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }
}
