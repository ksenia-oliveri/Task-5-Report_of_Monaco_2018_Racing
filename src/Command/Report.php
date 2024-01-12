<?php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'app:report')]

class Report extends Command
{
    protected function configure(): void
    {
        $this->addOption('files', null, InputOption::VALUE_REQUIRED);
    }
}