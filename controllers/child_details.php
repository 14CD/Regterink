<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 25/10/2018
 * Time: 09:49
 */

$id = $_GET['id'];

$child = $app['database']->selectWhere("users", $id);

require "views/admin/child_details.view.php";