<?php

namespace App;

use App\Exceptions;
use App\Helper\FileHelper;
use App\Parser\Parser;
use App\Presenter\ConsolePresenter;
use App\Presenter\Printer\JSONPrinter;

class Application
{
    /**
     * @throws Exceptions\ExceptionAbstract
     */
    public function start(?string $fileName)
    {
        if (empty($fileName)) {
            throw new Exceptions\ErrorArgumentExeption();
        }

        $fileHelper = new FileHelper();

        if (!$fileHelper->isExist($fileName)) {
            throw new Exceptions\FileNotFoundExeprion();
        }

        if (!$fileHelper->isReadable($fileName)) {
            throw new Exceptions\InvalidFileExeption();
        }

        $stream = $fileHelper->getStream($fileName);

        $parser = new Parser($fileHelper);
        $information = $parser->parse($stream);

        $printer = new JSONPrinter();
        $presenter = new ConsolePresenter($printer);
        $presenter->present($information);
    }
}