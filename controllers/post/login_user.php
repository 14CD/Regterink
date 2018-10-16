<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Agyei
 * Date: 16/10/2018
 * Time: 11:54
 */

//retrieve data

// Here I post the values to the function that makes connection to the database
$values = [$_POST['email'], $_POST['password']];

//checks on data

//database Select
$app['database']->LoginAs($values);

require("views/login.view.php");

