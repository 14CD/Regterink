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
        'name' => 'database name',
        'username' => 'username',
        'password' => 'password',
        'connection' => 'mysql:host=localhost:3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
