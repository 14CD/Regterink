<?php
/**
 * GET routes
 */

$router->get('', 'controllers/index.php');
$router->get('home', 'controllers/index.php');
$router->get('login', 'controllers/login.php');

$router->get('dashboard', 'controllers/dashboard.php');
$router->get('user', 'controllers/users.php');

$router->get('add_user', 'controllers/new_user.php');
//var_dump($router);
/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
$router->post('post_add_user', 'controllers/post/add_user.php');