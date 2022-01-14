<?php

namespace App\Presenter\Printer;

use App\Models\Crawlers;

class JSONPrinter implements PrinterInterface
{

    private array $information;

    public function __construct()
    {
        $this->information = [];
    }

    public function setViews(int $views): PrinterInterface
    {
        $this->information['views'] = $views;

        return $this;
    }

    public function setLines(int $lines): PrinterInterface
    {
        $this->information['lines'] = $lines;

        return $this;
    }

    public function setUrls(int $urls): PrinterInterface
    {
        $this->information['urls'] = $urls;

        return $this;
    }

    public function setTraffic(int $traffic): PrinterInterface
    {
        $this->information['traffic'] = $traffic;

        return $this;
    }

    public function setCrawlers(Crawlers $crawlers): PrinterInterface
    {
        $this->information['crawlers'] = $crawlers->toArray();

        return $this;
    }

    public function setStatusCodes(array $codes): PrinterInterface
    {
        $this->information['statusCodes'] = $codes;

        return $this;
    }

    public function view(): string
    {
        return json_encode($this->information, JSON_PRETTY_PRINT);
    }
}