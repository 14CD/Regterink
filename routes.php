<?php
/**
 * GET routes
 */
$router->get('', 'controllers/index.php');
$router->get('home', 'controllers/index.php');
$router->get('login', 'controllers/login.php');

/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
