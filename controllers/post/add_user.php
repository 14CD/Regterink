<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 11/10/2018
 * Time: 12:40
 */

//retrieve data
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$date = $_POST['date'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$roleid = $_POST['roleid'];

//database insert
$table = "roles";
$conditions = ["description"];
$values = ["User"];
$app['database']->insertInto($table, $conditions, $values);