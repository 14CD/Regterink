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
    $target_dir = "/Users/aaronweggemans/Documents/Regterink/public/images/profile/";
    $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
//         if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["profilePicture"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //database update
    $app['database']->Account_info_change($values);
    require("views/admin/account_details.view.php");
}
