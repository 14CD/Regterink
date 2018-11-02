<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 23/10/2018
 * Time: 16:50
 */

if($_POST)
{
    $id = $_POST['id'];

    $table = "users";

    $conditions = [
        'fname',
        'lname',
        'email',
        'mobile',
        'active'
    ];

    $values = [
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['active'],
    ];

    $app['database']->changeUser($table, $conditions, $values, $id);
    header("Location: user");
}