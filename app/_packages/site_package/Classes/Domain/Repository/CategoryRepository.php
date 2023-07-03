<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use VasilDakov\SitePackage\Domain\Repository\Traits\StoragePageAgnosticTrait;

class CategoryRepository extends Repository
{
    use StoragePageAgnosticTrait;
}
