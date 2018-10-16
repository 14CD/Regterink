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
        'name' => 'regterink',
        'username' => 'regterink',
        'password' => 'HG!bf;"f_a9V/)}E',
        'connection' => 'mysql:host=188.166.81.124',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
