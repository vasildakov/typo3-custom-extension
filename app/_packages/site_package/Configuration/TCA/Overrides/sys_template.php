<?php

defined('TYPO3') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'site_package',
    'Configuration/TypoScript',
    'Product'
);
