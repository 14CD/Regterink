<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 01/11/2018
 * Time: 22:07
 */

if ($_POST)
{
    $id = $_POST['id'];

    $Allvalues = [
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['reason'],
        $_POST['comment'],
        $_POST['dob']
    ];

    $conditions = [
        'id',
        "nickname",
        "dob",
        "reason",
        "idcareforschema",
        "comment"
    ];

    $implement = [
        $id,
        $_POST['fname'] . $_POST['lname'],
        '1998-01-01',
        $_POST['reason'],
        $id,
        $_POST['comment']
    ];

    $table = "profiles_kids";

    $app['database']->addChildDetails($id, $table, $conditions, $implement);

    header("Location: child_details?id=$id");
}

