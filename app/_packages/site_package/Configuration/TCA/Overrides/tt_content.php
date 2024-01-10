<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// This makes the plugin selectable in the BE.
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
// extension name, matching the PHP namespaces (but without the vendor)
    'SitePackage',
    'ProductIndex',
    'Product Index',
    'EXT:site_package/Resources/Public/Icons/Extension.svg'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'SitePackage',
    'ProductShow',
    'Product Show',
    'EXT:site_package/Resources/Public/Icons/Extension.svg'
);

// This removes the default controls from the plugin.
/* $controlsToRemove = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'] = [
    'sitepackage_productindex' => $controlsToRemove,
    'sitepackage_productshow' => $controlsToRemove,
]; */

// 'LLL:EXT:site_package/Resources/Private/Language/locallang.xlf:plugin.sitepackage_product_index',
// 'LLL:EXT:site_package/Resources/Private/Language/locallang.xlf:plugin.sitepackage_product_show',