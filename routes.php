<?php
/**
 * GET routes
 */

//$_SESSION['AdminLogin']
//$_SESSION['VerzorgendeLogin']
//$_SESSION['OuderLogin']
//$_SESSION['KindLogin']

$router->get('', 'controllers/index.php');
$router->get('home', 'controllers/index.php');

$router->post('login_user', 'controllers/post/login_user.php');
$router->get('pdf', 'controllers/get/pdftest.php');
$router->get('new_password', 'controllers/change_password.php');
$router->get('children', 'controllers/children.php');
$router->get('dashboard', 'controllers/dashboard.php');
$router->get('user', 'controllers/users.php');
$router->get('add_user', 'controllers/new_user.php');
$router->get('account_details', 'controllers/account_details.php');
$router->get('nuturing', 'controllers/nuturing.php');
$router->get('documents', 'controllers/get/documents/list_documents.php');
$router->get('logout', 'controllers/logout.php');

$router->get('user_details', 'controllers/user_details.php');
$router->get('child_details', 'controllers/child_details.php');

$router->post('child_details_post', 'controllers/post/child_details_post.php');

$router->post('post_add_user', 'controllers/post/add_user.php');
$router->post('sendmail', 'controllers/post/send_mail.php');
$router->post('change_details', 'controllers/post/change_details.php');
$router->post('Account_info_change', 'controllers/post/Account_info_change.php');

//Remove actions
$router->post('post_remove_user', 'controllers/post/post_remove_user.php');

$router->get('login', 'controllers/login.php');