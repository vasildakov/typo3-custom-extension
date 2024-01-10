<?php

namespace VasilDakov\SitePackage\Tests\Functional\Domain\Repository;

use Psr\Container\ContainerInterface;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
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

        $this->subject = $this->get(ProductRepository::class);
    }


    public function testJustSimpleTest(): void
    {
        $container = $this->getContainer();

        //$repository = $container->get(ProductRepository::class);

        self::assertInstanceOf(ProductRepository::class, $this->subject);
        self::assertInstanceOf(ContainerInterface::class, $container);
    }
}
