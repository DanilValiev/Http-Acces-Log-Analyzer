<?php

require_once 'vendor/autoload.php';

use App\Application;
use App\Exceptions\ExceptionAbstract;

$application = new Application();

$filename = null;
if (isset($argv[1])) {
    $filename = $argv[1];
}

try {
    $application->start($filename);
} catch (ExceptionAbstract $ex) {
    $ex->printMessage();
}
