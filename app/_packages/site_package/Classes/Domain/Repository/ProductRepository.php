<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use VasilDakov\SitePackage\Domain\Repository\Traits\StoragePageAgnosticTrait;

/**
 * Class ProductRepository
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2023 Vasil Dakov
 * @version 1.0
 */
class ProductRepository extends Repository
{
    use StoragePageAgnosticTrait;

    public function findByCategory(string $category): QueryResultInterface
    {
        $query = $this->createQuery();
        return $query
            ->matching(
                $query->logicalAnd(
                    $query->equals('categories.title', $category)
                )
            )
            ->execute();
    }
}
