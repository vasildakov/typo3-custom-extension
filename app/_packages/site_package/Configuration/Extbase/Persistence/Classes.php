<?php

declare(strict_types=1);

return [
    \VasilDakov\SitePackage\Domain\Model\Product::class => [
        'tableName' => 'tx_sitepackage_domain_model_product',
        'subclasses' => [
            'categories' => \VasilDakov\SitePackage\Domain\Model\Category::class,
        ],
    ],
    \VasilDakov\SitePackage\Domain\Model\Category::class => [
        'tableName' => 'tx_sitepackage_domain_model_category',
    ],
];
