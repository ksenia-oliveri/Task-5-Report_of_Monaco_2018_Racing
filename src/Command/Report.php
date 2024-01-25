<?php
namespace App\Command;

use App\PrintReport;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:report')]

class Report extends Command
{
    protected function configure(): void
    {
        $this->addOption('files', null, InputOption::VALUE_REQUIRED)
        ->addOption('asc', null, InputOption::VALUE_NONE)
        ->addOption('desc', null, InputOption::VALUE_NONE)
        ->addArgument('driver', InputArgument::OPTIONAL)
        ->addArgument('driver name', InputArgument::OPTIONAL);

       
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $obj = new PrintReport;
        $obj->PrintReport();
        if($input->getOption('files') && $input->getOption('desc'))
        {   
            $result = array_reverse(file('./report.txt'));
            $output->writeln($result);
        } elseif($input->getOption('files') && $input->getArgument('driver name'))
        {
            foreach(file('./report.txt') as $lines)
            {   
                $driver = explode(' | ', $lines);
                if(trim($driver[0]) == $input->getArgument('driver name'))
                {   
                    $result = implode(' | ', $driver);
                    $output->writeln($result);
                }
            }
        } elseif(($input->getOption('files') && $input->getOption('asc')) || $input->getOption('files'))
        {
            $output->writeln(file_get_contents('./report.txt'));
        }   
        return Command::SUCCESS;
    }       
}
