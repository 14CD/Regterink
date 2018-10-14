<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 13/10/2018
 * Time: 01:08
 */

$id = $_GET['id'];

//die(var_dump($id));

$app['database']->removeFromUsersTable("users", $id);

header("Location: $url/user");