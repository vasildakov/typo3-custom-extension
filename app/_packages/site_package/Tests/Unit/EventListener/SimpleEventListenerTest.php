<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\EventListener;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use VasilDakov\SitePackage\Event\SimpleEvent;
use VasilDakov\SitePackage\EventListener\SimpleEventListener;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SimpleEventListenerTest extends TestCase
{
    protected LoggerInterface $logger;

    protected function setUp(): void
    {
        parent::setUp();
        $this->logger = $this->createMock(LoggerInterface::class);
    }

    public function testItCanBeConstructed(): void
    {
        $listener = new SimpleEventListener($this->logger);

        self::assertInstanceOf(SimpleEventListener::class, $listener);
    }


    public function testItCanBeInvokedWithEvent(): void
    {
        $message = 'simple message';

        $listener = new SimpleEventListener($this->logger);
        $this->logger->expects(self::once())->method('debug')->with($message);

        $listener(new SimpleEvent($message));
    }
}
