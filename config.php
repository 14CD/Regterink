<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */
/**
 * @database - configuration for PDO()
 */


return [
    'database' => [
        'name' => 'db_regterink',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
