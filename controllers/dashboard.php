<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 09/10/2018
 * Time: 17:56
 */

$users = $app['database']->selectAll('users');

$nutures = $app['database']->selectNutures('users');

require "views/admin/index.view.php";