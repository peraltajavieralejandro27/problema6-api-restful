<?php

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'TestCandidatos',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
                'suffix' => 'db3',
            ],
            'development' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'TestCandidatos',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
                'suffix' => 'db3',
            ],
            'testing' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'TestCandidatos',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
                'suffix' => 'db3',
            ]
        ],
        'version_order' => 'creation'
    ];
