<?php

return [
    'driver' => 'mysql',
    'dsn' => [
        'host' => env('DB_HOST', 'localhost'),
        'port' => env('DB_PORT', '3306'),
        'dbname' => env('DB_NAME', 'example'),
        'charset' => 'utf8mb4'
    ],
    'user' => env('DB_USER'),
    'password' => env('DB_PASSWORD'),
    'attributes' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];
