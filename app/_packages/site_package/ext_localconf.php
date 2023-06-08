<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use VasilDakov\SitePackage\Controller\ProductController;

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SitePackage',
        'ProductIndex',
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index',
        ],
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index',
        ]
    );
})();

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SitePackage',
        'ProductShow',
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'show',
        ],
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'show',
        ]
    );
})();

ExtensionManagementUtility::addPageTSConfig('
    @import "EXT:site_package/Configuration/page.tsconfig"
');

/*
ExtensionUtility::configurePlugin(
    'MyCustomExtension',
    'ProductSingle',
    [ProductController::class => 'index'],
);

ExtensionManagementUtility::addPageTSConfig('
    @import "EXT:site_package/Configuration/page.tsconfig"
'); */