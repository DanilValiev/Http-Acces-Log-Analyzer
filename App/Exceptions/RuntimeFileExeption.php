<?php

namespace App\Exceptions;

class RuntimeFileExeption extends ExceptionAbstract
{
    const RU_MESSAGE = 'Возникла ошибка при работе с файлом, возможно он некорректен';

    const EN_MESSAGE = 'An error occurred while working with the file, it may be incorrect';

    public function __construct()
    {
        parent::__construct(self::EN_MESSAGE, self::RU_MESSAGE);
    }
}