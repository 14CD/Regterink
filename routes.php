<?php
/**
 * GET routes
 */

$router->get('', 'controllers/index.php');
$router->get('home', 'controllers/index.php');
$router->get('login', 'controllers/login.php');

$router->get('dashboard', 'controllers/dashboard.php');
$router->get('verzorgende', 'controllers/verzorgende.php');


//var_dump($router);
/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
