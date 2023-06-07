<?php

defined('TYPO3') || die();

// This makes the plugin selectable in the BE.
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tea',
    'TeaIndex',
    'LLL:EXT:tea/Resources/Private/Language/locallang.xlf:plugin.tea_index',
    'EXT:tea/Resources/Public/Icons/Extension.svg'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tea',
    'TeaShow',
    'LLL:EXT:tea/Resources/Private/Language/locallang.xlf:plugin.tea_show',
    'EXT:tea/Resources/Public/Icons/Extension.svg'
);

// This removes the default controls from the plugin.
$controlsToRemove = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'] = [
    'tea_teaindex' => $controlsToRemove,
    'tea_teashow' => $controlsToRemove,
];
