<?php

namespace VasilDakov\SitePackage\Tests\Unit\Domain\Repository;

use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use VasilDakov\SitePackage\Domain\Model\Product;
use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

class ProductRepositoryTest extends TestCase
{
    protected ObjectManagerInterface $objectManager;
    protected PersistenceManagerInterface $persistenceManager;
    protected QueryInterface $query;
    protected QuerySettingsInterface $querySettings;
    protected QueryResultInterface $queryResult;

    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager      = $this->createMock(ObjectManagerInterface::class);
        $this->persistenceManager = $this->createMock(PersistenceManagerInterface::class);
        $this->query              = $this->createMock(QueryInterface::class);
        $this->querySettings      = $this->createMock(QuerySettingsInterface::class);
        $this->queryResult        = $this->createMock(QueryResultInterface::class);
    }

    public function testItCanBeCreated(): void
    {
        $repository = new ProductRepository($this->objectManager);

        self::assertInstanceOf(ProductRepository::class, $repository);
    }

    public function testItCanFindByCategory(): void
    {
        $repository = new ProductRepository($this->objectManager);

        $reflection = new \ReflectionClass($repository);
        $reflection
            ->getProperty('persistenceManager')
            ->setValue($repository, $this->persistenceManager)
        ;

        $this->persistenceManager
            ->expects(self::once())
            ->method('createQueryForType')
            ->willReturn($this->query)
        ;

        $this->query
            ->expects(self::exactly(2))
            ->method('getQuerySettings')
            ->willReturn($this->querySettings)
        ;

        $this->querySettings
            ->expects(self::once())
            ->method('setIgnoreEnableFields')
            ->with(true)
            ->willReturnSelf()
        ;

        $this->querySettings
            ->expects(self::once())
            ->method('setRespectStoragePage')
            ->with(false)
            ->willReturnSelf()
        ;

        $this->query
            ->expects(self::once())
            ->method('matching')
            ->willReturnSelf()
        ;

        $this->query
            ->expects(self::once())
            ->method('execute')
            ->willReturn($this->queryResult)
        ;

        self::assertInstanceOf(
            QueryResultInterface::class,
            $repository->findByCategory('Smartphone')
        );
    }
}
