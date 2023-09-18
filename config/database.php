<?php

return [
    'mysql' =>
        [
            'driver' => 'mysql',
            'dsn' => [
                'host' => env('MYSQL_HOST', 'localhost'),
                'port' => env('MYSQL_PORT', '3306'),
                'dbname' => env('MYSQL_DATABASE', 'example'),
                'charset' => 'utf8mb4'
            ],
            'user' => env('MYSQL_USER'),
            'password' => env('MYSQL_PASSWORD'),
            'attributes' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ]
];
