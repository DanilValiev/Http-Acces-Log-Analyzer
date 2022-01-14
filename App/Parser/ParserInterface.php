<?php

namespace App\Parser;

use App\Models\Information;

interface ParserInterface
{
    /**
     * @param resource $stream
     */
    public function parse($stream): Information;
}