<?php

namespace App\Models;

class Crawlers
{
    private int $google;

    private int $bing;

    private int $baidu;

    private int $yandex;

    public function __construct()
    {
        $this->google = 0;
        $this->bing = 0;
        $this->baidu = 0;
        $this->yandex = 0;
    }

    public function getGoogle(): int
    {
        return $this->google;
    }

    public function addGoogle(): self
    {
        $this->google += 1;

        return $this;
    }

    public function getBing(): int
    {
        return $this->bing;
    }

    public function addBing(): self
    {
        $this->bing += 1;

        return $this;
    }

    public function getBaidu(): int
    {
        return $this->baidu;
    }

    public function addBaidu(): self
    {
        $this->baidu += 1;

        return $this;
    }

    public function getYandex(): int
    {
        return $this->yandex;
    }


    public function addYandex(): self
    {
        $this->yandex += 1;

        return $this;
    }

    public function toArray(): array
    {
        return array(
            'google' => $this->getGoogle(),
            'bing' => $this->getBing(),
            'baidu' => $this->getBaidu(),
            'yandex' => $this->getYandex()
        );
    }
}