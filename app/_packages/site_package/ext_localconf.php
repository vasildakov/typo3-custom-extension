<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use VasilDakov\SitePackage\Controller\ProductController;

ExtensionUtility::configurePlugin(
    'MyCustomExtension',
    'ProductSingle',
    [ProductController::class => 'helloWorld'],
);

ExtensionManagementUtility::addPageTSConfig('
    @import "EXT:site_package/Configuration/page.tsconfig"
');