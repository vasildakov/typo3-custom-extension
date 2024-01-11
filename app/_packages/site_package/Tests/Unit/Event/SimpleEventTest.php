<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Event;

use PHPUnit\Framework\TestCase;
use VasilDakov\SitePackage\Event\SimpleEvent;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SimpleEventTest extends TestCase
{
    public function testItCanBeCreated(): void
    {
        $event = new SimpleEvent('message');

        self::assertInstanceOf(SimpleEvent::class, $event);

    }
}
