<?php

namespace App\Exceptions;

class InvalidFileExeption extends ExceptionAbstract
{
    const RU_MESSAGE = 'Не удалось открыть переданный файл, проверьте его доступность';

    const EN_MESSAGE = 'Failed to open uploaded file, please check if it is available';

    public function __construct()
    {
        parent::__construct(self::EN_MESSAGE, self::RU_MESSAGE);
    }
}