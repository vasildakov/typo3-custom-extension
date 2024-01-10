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
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index2',
        ],
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'index2',
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

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SitePackage',
        'ProductSearch',
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'search',
        ],
        [
            \VasilDakov\SitePackage\Controller\ProductController::class => 'search',
        ]
    );
})();

ExtensionManagementUtility::addPageTSConfig('
    @import "EXT:site_package/Configuration/page.tsconfig"
');
