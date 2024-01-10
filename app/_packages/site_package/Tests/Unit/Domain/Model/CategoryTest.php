<?php

namespace VasilDakov\SitePackage\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use VasilDakov\SitePackage\Domain\Model\Category;
use VasilDakov\SitePackage\Domain\Model\Product;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Domain\Model\Category
 */
class CategoryTest extends TestCase
{
    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = $this->createMock(Product::class);
    }

    public function testItCanBeCreated(): void
    {
        $category = new Category();

        self::assertInstanceOf(Category::class, $category);
    }

    public function testItCanSetAndGetProperties(): void
    {
        $category = new Category();
        $category->setTitle('Title');

        self::assertEquals('Title', $category->getTitle());
    }

    public function testItCanAddProducts(): void
    {
        // arrange
        $category = new Category();

        // act
        $category->addProduct($this->product);

        // assert
        self::assertCount(1, $category->getProducts());
        self::assertInstanceOf(ObjectStorage::class, $category->getProducts());
    }

    public function testItCanRemoveProducts(): void
    {
        // arrange
        $category = new Category();

        // act
        $category->addProduct($this->product);
        $category->removeProduct($this->product);

        // assert
        self::assertCount(0, $category->getProducts());
    }

    public function testItSetProducts(): void
    {
        // arrange
        $category = new Category();

        // act
        $category->setProducts(new ObjectStorage());

        // assert
        self::assertInstanceOf(ObjectStorage::class, $category->getProducts());
    }
}
