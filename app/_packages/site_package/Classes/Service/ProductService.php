<?php

declare(strict_types=1);

namespace VasilDakov\SitePackage\Service;

use VasilDakov\SitePackage\Domain\Repository\ProductRepository;

final class ProductService implements ProductServiceInterface
{
    public function __construct(readonly ProductRepository $products)
    {
    }
}
