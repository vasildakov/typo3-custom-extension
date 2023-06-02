<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * Class Price
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2023 Vasil Dakov
 * @version 1.0
 */
final class Price extends AbstractValueObject
{
    private float $amount;
}