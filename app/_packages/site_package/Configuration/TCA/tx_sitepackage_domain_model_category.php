<?php

$tca = [
    'ctrl' => [
        'title' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_category',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'default_sortby' => 'title',
        'iconfile' => 'EXT:site_package/Resources/Public/Icons/Record.svg',
        'searchFields' => 'name, description',
    ],
    'types' => [
        '1' => ['showitem' => 'title, description'],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_category.title',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_category.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'rows' => 8,
                'cols' => 40,
                'max' => 2000,
                'eval' => 'trim',
            ],
        ],
        'products' => [
            'label' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_db.xlf:tx_sitepackage_domain_model_category.products',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_sitepackage_domain_model_product',
                'foreign_table_where' => ' AND tx_sitepackage_domain_model_product.pid=###CURRENT_PID### ORDER BY tx_sitepackage_domain_model_product.title ',
                'MM' => 'tx_sitepackage_domain_model_product_category',
                'MM_opposite_field' => 'products',
                'minitems' => 0,
                'maxitems' => 99,
            ]
        ]
    ],
];

return $tca;