<?php

require __DIR__.'/vendor/autoload.php';

use App\BuildReport;
use App\Command\Report;
use App\PrintReport;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new Report);

$application->run();

// $report = new PrintReport;
// $report->PrintReport();

// $report = new BuildReport;
// var_dump($report->BuildReport());