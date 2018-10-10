<?php
/**
 * GET routes
 */

$router->get('', 'controllers/index.php');
$router->get('home', 'controllers/index.php');
$router->get('login', 'controllers/login.php');

$router->get('dashboard', 'controllers/dashboard.php');
$router->get('employee', 'controllers/verzorgende.php');

$router->get('new_employee', 'controllers/nieuw_verzorgende.php');
//var_dump($router);
/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
$router->post('add_employee', 'controllers/nieuw_verzorgende');