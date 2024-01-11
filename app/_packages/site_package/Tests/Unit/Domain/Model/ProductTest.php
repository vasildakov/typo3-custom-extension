<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use VasilDakov\SitePackage\Domain\Model\Category;
use VasilDakov\SitePackage\Domain\Model\Product;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Domain\Model\Product
 */
final class ProductTest extends TestCase
{
    protected Category $category;

    protected FileReference $image;

    protected LazyLoadingProxy $proxy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = $this->createMock(Category::class);
        $this->image    = $this->createMock(FileReference::class);
        $this->proxy    = $this->createMock(LazyLoadingProxy::class);
    }

    public function testItCanBeCreated(): void
    {
        $product = new Product();

        self::assertInstanceOf(Product::class, $product);
    }

    public function testItCanSetAndGetProperties(): void
    {
        $product = new Product();
        $product->setTitle('Title');
        $product->setDescription('Description');
        $product->setPrice(1200);

        self::assertEquals('Title', $product->getTitle());
        self::assertEquals('Description', $product->getDescription());
        self::assertEquals(1200, $product->getPrice());
    }

    public function testItCanAddCategory(): void
    {
        // arrange
        $product = new Product();
        $product->addCategory($this->category);

        // act
        $categories = $product->getCategories();

        // assert
        self::assertInstanceOf(ObjectStorage::class, $categories);
        self::assertCount(1, $categories);
    }

    public function testItCanRemoveCategory(): void
    {
        // arrange
        $product = new Product();
        $product->addCategory($this->category);

        // act
        $product->removeCategory($this->category);
        $categories = $product->getCategories();

        // assert
        self::assertInstanceOf(ObjectStorage::class, $categories);
        self::assertCount(0, $categories);
    }


    public function testItCanSetMultipleCategories(): void
    {
        // arrange
        $product = new Product();
        $storage = new ObjectStorage();
        $storage->attach($this->category);

        // act
        $product->setCategories($storage);
        $categories = $product->getCategories();

        // assert
        self::assertInstanceOf(ObjectStorage::class, $categories);
    }

    public function testItCanSetAndGetImage(): void
    {
        // arrange
        $product = new Product();

        // act
        $product->setImage($this->image);
        $image = $product->getImage();

        // assert
        self::assertInstanceOf(FileReference::class, $image);
    }

    /**
     * @group image
     */
    public function testItCanGetLazyLoadingProxy(): void
    {
        $product = new Product();

        // it has been cached by typo3
        $reflection = new \ReflectionClass($product);
        $image = $reflection->getProperty('image');
        $image->setValue($product, $this->proxy);

        $this->proxy->expects(self::once())
            ->method('_loadRealInstance')
            ->willReturn($this->image)
        ;

        // assert
        $result = $reflection->getMethod('getImage')->invoke($product);
        self::assertInstanceOf(FileReference::class, $result);
        self::assertInstanceOf(FileReference::class, $product->getImage());
    }
}
