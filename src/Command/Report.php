<?php
namespace App\Command;

use App\PrintReport;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:report')]

class Report extends Command
{
    protected function configure(): void
    {
        $this->addOption('files', null, InputOption::VALUE_REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $obj = new PrintReport;
        $obj->PrintReport();
        $result = file_get_contents('report.txt');
        $output->writeln($result);

        return Command::SUCCESS;
    }
}