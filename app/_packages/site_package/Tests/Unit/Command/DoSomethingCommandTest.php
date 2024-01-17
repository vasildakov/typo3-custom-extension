<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use VasilDakov\SitePackage\Command\DoSomethingCommand;

class DoSomethingCommandTest extends UnitTestCase
{
    protected InputInterface $input;
    protected OutputInterface $output;

    protected function setUp(): void
    {
        parent::setUp();
        $this->input = $this->createMock(InputInterface::class);
        $this->output = $this->createMock(OutputInterface::class);
    }

    public function testItCanBeCreated(): void
    {
        $command = new DoSomethingCommand();

        self::assertInstanceOf(DoSomethingCommand::class, $command);
    }

    public function testItCanBeExecuted(): void
    {
        $command = new DoSomethingCommand();

        $result = $command->execute($this->input, $this->output);

        self::assertEquals(Command::SUCCESS, $result);
    }
}
