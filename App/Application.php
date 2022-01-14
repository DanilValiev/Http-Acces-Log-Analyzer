<?php

namespace App;

use App\Exceptions\ErrorArgumentExeption;
use App\Exceptions\ExceptionAbstract;
use App\Exceptions\FileNotFoundExeprion;
use App\Exceptions\InvalidFileExeption;
use App\Exceptions\RuntimeFileExeption;
use App\Helper\FileHelper;
use App\Parser\Parser;
use App\Presenter\ConsolePresenter;
use App\Presenter\Printer\JSONPrinter;
use Exception;

class Application
{
    /**
     * @throws ExceptionAbstract
     */
    public function start(?string $fileName)
    {
        if (empty($fileName)) {
            throw new ErrorArgumentExeption();
        }

        $fileHelper = new FileHelper();

        if (!$fileHelper->isExist($fileName)) {
            throw new FileNotFoundExeprion();
        }

        if (!$fileHelper->isReadable($fileName)) {
            throw new InvalidFileExeption();
        }

        $stream = $fileHelper->getStream($fileName);
        $parser = new Parser($fileHelper);

        try {
            $information = $parser->parse($stream);
        } catch (Exception $ex) {
            throw new RuntimeFileExeption();
        }

        $printer = new JSONPrinter();
        $presenter = new ConsolePresenter($printer);
        $presenter->present($information);
    }
}