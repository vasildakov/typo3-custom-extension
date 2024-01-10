<?php

namespace VasilDakov\SitePackage\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\SitePackage\Domain\Model\Product;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @covers \VasilDakov\SitePackage\Domain\Model\Product
 */
class ProductTest extends TestCase
{
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

        self::assertEquals('Title', $product->getTitle());
        self::assertEquals('Description', $product->getDescription());
    }
}
