<?php

namespace App\Exceptions;

class FileNotFoundExeprion extends ExceptionAbstract
{
    const RU_MESSAGE = 'Переданный файл не найден';

    const EN_MESSAGE = 'Uploaded file not found';

    public function __construct()
    {
        parent::__construct(self::EN_MESSAGE, self::RU_MESSAGE);
    }
}