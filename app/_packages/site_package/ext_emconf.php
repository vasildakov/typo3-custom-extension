<?php
$GLOBALS['TSFE']->set_no_cache();

$EM_CONF[$_EXTKEY] = [
    'title' => 'TYPO3 Site Package',
    'description' => 'TYPO3 Site Package',
    'category' => 'templates',
    'author' => 'Vasil Dakov',
    'author_email' => 'vasil.dakov@digitaspixelpark.com',
    'author_company' => 'DPIX',
    'version' => '1.0.1',
    'state' => 'stable',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.27',
            'fluid_styled_content' => '11.5'
        ],
        'conflicts' => [],
    ],
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'autoload' => [
        'psr-4' => [
            'VasilDakov\\SitePackage\\' => 'Classes',
        ],
    ],

];