<?php

declare(strict_types=1);

namespace VasilDakov\Tea\Domain\Repository\Product;

use VasilDakov\Tea\Domain\Model\Product\Tea;
use VasilDakov\Tea\Domain\Repository\Traits\StoragePageAgnosticTrait;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Tea>
 */
class TeaRepository extends Repository
{
    use StoragePageAgnosticTrait;

    protected $defaultOrderings = ['title' => QueryInterface::ORDER_ASCENDING];
}
