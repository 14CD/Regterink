<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 11/10/2018
 * Time: 12:40
 */

//retrieve data
$table = "users";
$conditions = ["fname", "lname", "email", "mobile", "roleid"];
$values = [$_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mobile'], $_POST['roleid']];

//checks on data

//database insert
$app['database']->insertInto($table, $conditions, $values);

require("views/admin/add_user.view.php");