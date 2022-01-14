<?php

namespace App\Presenter;

use App\Models\Information;
use App\Presenter\Printer\PrinterInterface;

class ConsolePresenter implements PresenterInterface
{
    private PrinterInterface $viewer;

    public function __construct(PrinterInterface $viewer)
    {
        $this->viewer = $viewer;
    }

    public function setViewer(PrinterInterface $view)
    {
        $this->viewer = $view;
    }

    public function present(Information $information)
    {
        $this->viewer
            ->setViews($information->getViews())
            ->setLines($information->getLines())
            ->setUrls($information->getUrlsCount())
            ->setTraffic($information->getTraffic())
            ->setCrawlers($information->getCrawlers())
            ->setStatusCodes($information->getStatusCodes())
        ;

        $response = $this->viewer->view();

        print "{$response} \n";
    }
}