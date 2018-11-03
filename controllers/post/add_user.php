<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 11/10/2018
 * Time: 12:40
 */

//retrieve data
$wachtwoord = trim($_POST['password']);
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

//database insert
$app['database']->insertNewUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mobile'], $hash, $_POST['role'], $_POST['active'], $_POST['date']);

header('Location: user');
