<?php

use Psr\Log\LogLevel;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Log\Writer\FileWriter;


$GLOBALS['TYPO3_CONF_VARS']['LOG']['VasilDakov']['SitePackage']['EventListener']['SimpleEventListener']['writerConfiguration'] = [
    LogLevel::DEBUG => [
        FileWriter::class => [
            'logFile' => Environment::getVarPath() . '/log/debug.log'
        ]
    ],
];
