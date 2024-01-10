<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

class Category extends AbstractEntity
{
    protected string $title = '';

    /**
     * Categories
     *
     * @var ObjectStorage<Product>
     * @Lazy
     */
    protected ObjectStorage $products;


    public function __construct()
    {
        $this->products = new ObjectStorage();
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    public function getProducts(): ObjectStorage
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        $this->products->attach($product);
    }

    public function removeProduct(Product $product): void
    {
        $this->products->detach($product);
    }

    public function setProducts(ObjectStorage $products): void
    {
        $this->products = $products;
    }
}
