<?php
/**
 * GET routes
 */
$router->get('/', 'controllers/index.php');
$router->get('home', 'controllers/index.php');
$router->get('players', 'controllers/players.php');
$router->get('games', 'controllers/games.php');
$router->get('users', 'controllers/users.php');
$router->get('battles', 'controllers/battles.php');
$router->get('excercise', 'controllers/excercise.php');

//var_dump($router);
/**
 * POST routes
 */
$router->post('/add_player', 'controllers/add_player.php');
