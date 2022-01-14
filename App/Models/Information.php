<?php

namespace App\Models;

class Information
{
    private int $views;

    private int $lines;

    private array $urls;

    private int $traffic;

    private Crawlers $crawlers;

    private array $statusCodes;

    public function __construct()
    {
        $this->views = 0;
        $this->urls = array();
        $this->traffic = 0;
        $this->statusCodes = array();
        $this->crawlers = new Crawlers();
        $this->lines = 0;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function addViews(): self
    {
        $this->views += 1;

        return $this;
    }

    public function getLines(): int
    {
        return $this->lines;
    }

    public function addLines(): self
    {
        $this->lines += 1;

        return $this;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    public function getUrlsCount(): int
    {
        return count($this->urls);
    }

    public function addUrls(string $url): self
    {
        if (!in_array($url, $this->urls)) {
            $this->urls[] = $url;
        }

        return $this;
    }

    public function getTraffic(): int
    {
        return $this->traffic;
    }

    public function addTraffic(int $sum): self
    {
        $this->traffic += $sum;

        return $this;
    }

    public function getCrawlers(): Crawlers
    {
        return $this->crawlers;
    }

    public function setCrawlers(Crawlers $crawlers): self
    {
        $this->crawlers = $crawlers;

        return $this;
    }

    public function getStatusCodes(): array
    {
        return $this->statusCodes;
    }

    public function addStatusCodes(int $statusCode)
    {
        if (isset($this->statusCodes[$statusCode])) {
            $this->statusCodes[$statusCode] += 1;
        } else if ($statusCode > 0) {
            $this->statusCodes[$statusCode] = 1;
        }
    }

}