<?php

namespace VasilDakov\SitePackage\Event;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SimpleEvent
{
    /**
     * @param string $message
     */
    public function __construct(public readonly string $message)
    {
    }
}
