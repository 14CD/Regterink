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

$router->get('account_details', 'controllers/account_details.php');
/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
$router->post('post_add_user', 'controllers/post/add_user.php');

//Remove actions
$router->get('post_remove_user', 'controllers/post/post_remove_user.php');