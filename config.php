<?php

return [
    'database' => [
        'name' => 'db_regterink',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=localhost-mysql',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
