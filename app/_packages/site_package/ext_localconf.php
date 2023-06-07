<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use VasilDakov\SitePackage\Controller\ProductController;

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
        'SitePackage',
        // arbitrary, but unique plugin name (not visible in the BE)
        'ProductIndex',
        // all actions
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index',
        ],
        // non-cacheable actions
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index',
        ]
    );
})();


/*
ExtensionUtility::configurePlugin(
    'MyCustomExtension',
    'ProductSingle',
    [ProductController::class => 'index'],
);

ExtensionManagementUtility::addPageTSConfig('
    @import "EXT:site_package/Configuration/page.tsconfig"
'); */