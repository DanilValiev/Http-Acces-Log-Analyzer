<?php

namespace App\Helper;

interface FileHelperInterface
{
    public function isExist(string $fileName): bool;

    public function isReadable(string $fileName): bool;

    public function getStream(string $fileName);

    public function getLineFromFile($stream);
}