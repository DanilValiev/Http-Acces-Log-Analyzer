<?php

namespace App\Presenter;

use App\Models\Information;
use App\Presenter\Printer\PrinterInterface;

interface PresenterInterface
{
    public function __construct(PrinterInterface $viewer);

    public function setViewer(PrinterInterface $view);

    public function present(Information $information);
}