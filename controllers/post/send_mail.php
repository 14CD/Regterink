<?php
/**
 * Created by PhpStorm.
 * User: aaronweggemans
 * Date: 23/10/2018
 * Time: 15:12
 */

try {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // the message
    $msg = "U wachtwoord is aangepast!
    
    U heeft uw wachtwoord aangepast voor vandaag.
    
    Met vriendelijke groet,
    ";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);

    // send email
    mail($email, "Wachtwoord aangepast", $msg);

    //database change
    $app['database']->passwordChange("users", password_hash($password, PASSWORD_DEFAULT), $email);

    header("Location: dashboard");
} catch (Exception $e) {
    header("Location: dashboard");
}