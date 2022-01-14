<?php

namespace App\Helper;

class FileHelper implements FileHelperInterface
{
    const FILE_MODE = 'r';

    public function isExist(string $fileName): bool
    {
        return file_exists($fileName);
    }

    public function isReadable(string $fileName): bool
    {
        return is_readable($fileName);
    }

    /**
     * @return false|resource
     */
    public function getStream(string $fileName)
    {
        return fopen($fileName, self::FILE_MODE);
    }

    /**
     * @return false|string
     */
    public function getLineFromFile($stream)
    {
        return fgets($stream);
    }
}