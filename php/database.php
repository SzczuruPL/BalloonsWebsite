<?php
    $hostName = "localhost";
    $userName = "jakub.bilyk";
    $userPass = "myPKrHAsql";
    $dbName = "jakub.bilyk";

    $conn = mysqli_connect($hostName, $userName, $userPass, $dbName);
    if($conn->connect_error)
    {
        die("nie dziala " . $conn->connect_error);
    }
?>