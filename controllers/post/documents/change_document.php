<?php

$targetfolder = __DIR__ . "/../../../public/documents/";
$targetfolder = $targetfolder . $_FILES['document']['name'];
//var_dump($_POST);
//var_dump($_FILES);
//var_dump($_SESSION);
//
//die();
if(file_exists($targetfolder)) {
    echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Dit document staat er al in.\", \"error\"); }, 500); </script>";
}

$file_type = $_FILES['document']['type'];

if ($file_type == "application/pdf") {
    if (move_uploaded_file($_FILES['document']['tmp_name'], $targetfolder)) {
        $app['database']->changeDocument($_SESSION['id'], $_POST['description'], $_FILES['document']['name'], $_POST['child']);
        header("Location: documents");
    } else {
        echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Er ging iets fout tijdens het uploaden.\", \"error\"); }, 500); </script>";
    }
}
?>