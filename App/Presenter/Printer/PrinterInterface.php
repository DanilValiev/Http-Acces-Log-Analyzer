<?php

namespace App\Presenter\Printer;

use App\Models\Crawlers;

interface PrinterInterface
{
    public function setViews(int $views): self;

    public function setLines(int $lines): self;

    public function setUrls(int $urls): self;

    public function setTraffic(int $traffic): self;

    public function setCrawlers(Crawlers $crawlers): self;

    public function setStatusCodes(array $codes): self;

    public function view(): string;
}