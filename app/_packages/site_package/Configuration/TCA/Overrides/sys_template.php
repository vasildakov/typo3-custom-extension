<?php

defined('TYPO3') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('product', 'Configuration/TypoScript', 'Product');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'product',
    'Configuration/TypoScript/',
    'Product frontend (optional)'
);

