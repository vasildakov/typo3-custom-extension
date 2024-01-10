<?php

namespace VasilDakov\SitePackage\Tests\Functional\Domain\Repository;

use Psr\Container\ContainerInterface;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Domain\Repository\ProductRepository
 * @covers \VasilDakov\SitePackage\Domain\Model\Product
 */
class ProductRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['vasildakov/site_package'];

    protected string $instancePath = '';

    protected PersistenceManager $persistentManager;
    protected ProductRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->persistenceManager = $this->get(PersistenceManagerInterface::class);

        $this->repository = $this->get(ProductRepository::class);
    }


    public function testItCanFindAllProducts(): void
    {
        $this->importCSVDataSet(__DIR__ . '/Fixtures/PersistedProduct.csv');

        $products = $this->repository->findAll();
        self::assertCount(1, $products);

        $product = $products->getFirst();
        self::assertInstanceOf(Product::class, $product);
        self::assertEquals('Apple iPhone 21 Max', $product->getTitle());
        self::assertEquals('The description of the iphone', $product->getDescription());
        self::assertEquals('1200', $product->getPrice());

        self::assertInstanceOf(ProductRepository::class, $this->repository);
    }

    public function testItCanFindByCategory(): void
    {
        $this->importCSVDataSet(__DIR__ . '/Fixtures/PersistedProductWithCategory.csv');

        $products = $this->repository->findByCategory('Smartphone');
        self::assertCount(1, $products);

        $product = $products->getFirst();
        self::assertInstanceOf(Product::class, $product);
        self::assertEquals('Apple iPhone 21 Max', $product->getTitle());
        self::assertEquals('The description of the iphone', $product->getDescription());
    }
}
