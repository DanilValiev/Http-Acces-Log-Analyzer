<?php

namespace App\Exceptions;

class ErrorArgumentExeption extends ExceptionAbstract
{
    const RU_MESSAGE = 'Не передано имя файла, используйте: parser.php filename';

    const EN_MESSAGE = 'No filename passed, use: parser.php filename';

    public function __construct()
    {
        parent::__construct(self::EN_MESSAGE, self::RU_MESSAGE);
    }
}