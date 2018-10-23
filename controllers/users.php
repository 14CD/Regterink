<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 09/10/2018
 * Time: 20:45
 */

//$users = $app['database']->selectAll("users");
$users = $app['database']->selectUsers("users");

require "views/admin/users.view.php";