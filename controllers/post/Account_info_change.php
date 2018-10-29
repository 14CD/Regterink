<?php

//retrieve data

// Here I post the values to the function that makes connection to the database
$values = [$_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['mobiel'], $_POST['role'], $_POST['id'], $_POST['active']];

//checks on data

//database update
$app['database']->Account_info_change($values);

require("views/admin/account_details.view.php");

