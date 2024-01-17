<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DoSomethingCommand extends Command
{
    protected function configure(): void
    {
        $this->setHelp('This command does nothing. It always succeeds.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        // Do awesome stuff
        return Command::SUCCESS;
    }
}