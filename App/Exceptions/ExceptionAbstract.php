<?php

namespace App\Exceptions;

use Exception;

abstract class ExceptionAbstract extends Exception
{
    private $enMessage;
    private $ruMessage;

    public function __construct(string $enMessage, $ruMessage)
    {
        parent::__construct($enMessage);

        $this->ruMessage = $ruMessage;
    }

    public function getRuMessage(): string
    {
        return $this->ruMessage;
    }

    public function getEnMessage(): string
    {
        return $this->enMessage;
    }

    private function chooseMessage(): string
    {
        return $this->getRuMessage();
    }

    public function printMessage()
    {
        $message = $this->chooseMessage();
        print "{$message} \n";
    }
}