<?php
$GLOBALS['TYPO3_CONF_VARS']  = [
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8mb4',
                'dbname' => 'typo3_database',
                'driver' => 'mysqli',
                'host' => 'mysql',
                'password' => '1',
                'port' => 3306,
                'tableoptions' => [
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
                ],
                'user' => 'admin',
            ],
        ],
    ],
];