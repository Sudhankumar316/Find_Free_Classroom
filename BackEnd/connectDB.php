<?php 
    $host = "localhost";
    $user = "root";
    $db = "class_free";

    $con = mysqli_connect($host, $user, "", $db);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
?>