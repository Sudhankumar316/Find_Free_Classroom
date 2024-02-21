<?php 
    session_start(); 
    $_SESSION['username'] = "admin";
    $_SESSION['email'] = "admin@vit.ac.in";
    header("location: ../FrontEnd/adminpanel.php"); 
?>