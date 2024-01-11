<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Price extends AbstractValueObject
{
    private float $amount;
}