<?php
/**
 * Created by PhpStorm.
 * User: Lenovo T530 i7
 * Date: 16-10-2018
 * Time: 11:46
 */

$children = $app['database']->selectAllChildren("users");

require 'views/admin/children.view.php';