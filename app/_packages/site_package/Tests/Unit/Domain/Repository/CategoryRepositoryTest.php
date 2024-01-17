<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Domain\Repository;

use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use VasilDakov\SitePackage\Domain\Repository\CategoryRepository;

class CategoryRepositoryTest extends TestCase
{
    protected ObjectManagerInterface $objectManager;

    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = $this->createMock(ObjectManagerInterface::class);
    }


    public function testItCanBeCreated(): void
    {
        $repository = new CategoryRepository($this->objectManager);

        self::assertInstanceOf(CategoryRepository::class, $repository);
    }
}
