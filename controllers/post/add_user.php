<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 11/10/2018
 * Time: 12:40
 */

if ($_POST) {
    //retrieve data
    $table = "users";

    $conditions = [
        "fname",
        "lname",
        "email",
        "mobile",
        "password",
        "role",
        "active",
        "date"
    ];

    $wachtwoord = trim($_POST['password']);

    $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $values = [
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['mobile'],
        $hash,
        $_POST['role'],
        $_POST['active'],
        $_POST['date']
    ];

    //checks on data

    //database insert
    $app['database']->insertInto($table, $conditions, $values);

    require("views/admin/add_user.view.php");
}