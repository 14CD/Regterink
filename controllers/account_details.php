<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 14/10/2018
 * Time: 15:37
 */

if($_SESSION)
{
    if($_SESSION['AdminLogin'])
    {
        $id = $_SESSION['AdminLogin'][0][0];
    }
    else if ($_SESSION['VerzorgendeLogin'])
    {
        $id = $_SESSION['VerzorgendeLogin'][0][0];
    }
    else if ($_SESSION['OuderLogin'])
    {
        $id = $_SESSION['OuderLogin'][0][0];
    }
    else {
        $id = $_SESSION['AdminLogin'][0][0];
    }

    $app['database']->get_current_account_info($id);
    $profilePicture = $app['database']->selectWhere("users", $id);

    require "views/admin/account_details.view.php";
}