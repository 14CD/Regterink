<?php

if ($_POST) {
    $values = [
        $_POST['fname'],
        $_POST['lname'],
        $_POST['email'],
        $_POST['mobiel'],
        $_POST['role'],
        $_POST['id'],
        $_POST['active'],
        $_FILES['profilePicture']['name']
    ];

    //checks on data
    $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        }
    }

    //database update
    $app['database']->account_info_change($values);
    header("Location: account_details");
}
