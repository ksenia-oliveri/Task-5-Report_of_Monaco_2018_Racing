<?php

require __DIR__.'/vendor/autoload.php';


use App\Command\Report;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new Report);

$application->run();
