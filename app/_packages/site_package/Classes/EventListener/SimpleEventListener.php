<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\EventListener;

use Psr\Log\LoggerInterface;
use VasilDakov\SitePackage\Event\SimpleEvent;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SimpleEventListener
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function __invoke(SimpleEvent $event): void
    {
        $this->logger->debug($event->message);
    }
}
