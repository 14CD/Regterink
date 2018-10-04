<?php

return [
    'database' => [
        'name' => 'smallhost',
        'username' => 'root',
        'password' => 'rootroot',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
