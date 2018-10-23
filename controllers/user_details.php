<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 23/10/2018
 * Time: 20:44
 */

$id = $_GET['id'];

$user = $app['database']->selectWhere("users", $id);

//die(var_dump($user));

require "views/admin/user_details.view.php";