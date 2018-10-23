<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 13/10/2018
 * Time: 01:08
 */

$id = $_POST['id'];

//die(var_dump($id));

$app['database']->removeFromUsersTable("users", $id);

header("Location: user");