<?php
/**
 * GET routes
 */
$router->get('your_unique_id/P1_OOAPP_Opdracht', 'controllers/index.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/home', 'controllers/index.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/players', 'controllers/players.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/games', 'controllers/games.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/users', 'controllers/users.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/battles', 'controllers/battles.php');
$router->get('your_unique_id/P1_OOAPP_Opdracht/excercise', 'controllers/excercise.php');

/**
 * POST routes
 */
$router->post('your_unique_id/P1_OOAPP_Opdracht/add_player', 'controllers/add_player.php');
