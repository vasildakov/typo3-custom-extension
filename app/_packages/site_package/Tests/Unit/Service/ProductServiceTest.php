<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Service;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;
use VasilDakov\SitePackage\Service\ProductService;

final class ProductServiceTest extends UnitTestCase
{
    protected ProductRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(ProductRepository::class);
    }


    public function testItCanBeCreated(): void
    {
        $service = new ProductService($this->repository);

        self::assertInstanceOf(ProductService::class, $service);
        self::assertInstanceOf(ProductRepository::class, $service->products);
    }
}
