<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Product extends AbstractEntity
{
    protected string $title = '';

    protected string $description = '';

    protected ?float $price = null;

    /**
     * @phpstan-var \TYPO3\CMS\Extbase\Domain\Model\FileReference|LazyLoadingProxy|null
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference|null
     * @Lazy
     */
    protected $image;

    /**
     * Categories
     *
     * @var ObjectStorage<Category>
     * @lazy
     */
    protected ObjectStorage $categories;


    public function __construct()
    {
        $this->categories = new ObjectStorage();
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

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImage(FileReference $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?FileReference
    {
        if ($this->image instanceof LazyLoadingProxy) {
            /** @var FileReference $image */
            $image = $this->image->_loadRealInstance();
            $this->image = $image;
        }

        return $this->image;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    public function removeCategory(Category $category): void
    {
        $this->categories->detach($category);
    }

    /**
     * @param ObjectStorage $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return ObjectStorage
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }
}
