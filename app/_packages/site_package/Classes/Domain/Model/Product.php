<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Product
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright 2009-2023 Vasil Dakov
 * @version 1.0
 */
class Product extends AbstractEntity
{
    private string $title;

    private string $description;

    private string $image;

    private Price $price;

    private ?Category $category;

    /**
     * @param Category|null $category
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
