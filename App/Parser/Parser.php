<?php

namespace App\Parser;

use App\Helper\FileHelperInterface;
use App\Models\Information;

class Parser implements ParserInterface
{
    const URL_PATTERN = '/\"[a-zA-Z]+T ([^\"]+) HTTP/';

    const TRAFFIC_PATTERN = '/HTTP\/[0-9]\.[0-9]\" [0-9][0-9][0-9]? ([0-9]+)* \"/';

    const CODE_PATTERN = '/HTTP\/[0-9]\.[0-9]\" ([0-9]+)/';

    const GOOGLE_PATTERN = '(Googlebot)';

    const BING_PATTERN = '(msnbot)';

    const BAIDU_PATTERN = '(Baiduspider)';

    const YANDEX_PATTERN = '(YandexBot)';

    private FileHelperInterface $fileHelper;

    public function __construct(FileHelperInterface $fileHelper)
    {
        $this->fileHelper = $fileHelper;
    }

    public function parse($stream): Information
    {
        $information = new Information;
        $crawlers = $information->getCrawlers();

        $string = $this->fileHelper->getLineFromFile($stream);

        while ($string !== false) {
            preg_match(self::URL_PATTERN, $string, $urls);
            preg_match(self::TRAFFIC_PATTERN, $string, $traffic);
            preg_match(self::CODE_PATTERN, $string, $code);

            if (!empty($urls[1]) && !empty($code[1])) {

                if ($code[1] === '301') {
                    $traffic[1] = 0;
                }

                if (preg_match(self::GOOGLE_PATTERN, $string)) {
                    $crawlers->addGoogle();
                }
                else if (preg_match(self::BING_PATTERN, $string)) {
                    $crawlers->addBing();
                }
                else if (preg_match(self::BAIDU_PATTERN, $string)) {
                    $crawlers->addBaidu();
                }
                else if (preg_match(self::YANDEX_PATTERN, $string)) {
                    $crawlers->addYandex();
                }

                $information
                    ->addViews()
                    ->addUrls($urls[1])
                    ->addTraffic($traffic[1] ?? 0)
                    ->setCrawlers($crawlers)
                    ->addStatusCodes($code[1])
                ;
            }

            $information->addLines();
            $string = $this->fileHelper->getLineFromFile($stream);
        }

        return $information;
    }
}