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
        'password' => 'rootroot',
        'connection' => 'mysql:host=localhost:3306',
        'name' => 'regterink',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
>>>>>>> 3e788b7e85a3f7f771dd465018148619b669fe73
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
