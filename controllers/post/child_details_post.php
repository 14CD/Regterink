<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 01/11/2018
 * Time: 22:07
 */

if ($_POST)
{
    $Allvalues = [
        $_POST['id'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['reason'],
        $_POST['comment'],
        $_POST['dob']
    ];

    $conditions = [
        "nickname",
        "dob",
        "reason",
        "idcareforschema",
    ];

    $implement = [
        $Allvalues[1] . $Allvalues[2],
        01-01-1998,
        $Allvalues[4],
        $Allvalues[0],
    ];

    $table = "profiles_kids";

    $app['database']->insertInto($table, $conditions, $implement);
}

