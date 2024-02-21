<?php
    session_start();

    include("connectDB.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $pwd = sha1($_POST['password']);
        $name = explode(".", $email);
        // echo $name[0];

        $query = "insert into engineers(userName, email, password) values ('$name[0]', '$email', '$pwd')";

        $result = mysqli_query($con, $query);
        if(!$result){
            if(mysqli_errno($con) == 1062){
                echo "<script>alert('Given email already exists'); window.location = '../FrontEnd/signup.php'; </script>";
            }
            // header("Location: ../FrontEnd/signup.php");
            echo "<script type='text/javascript'> alert('Registration Unsuccessful try after some time'); window.location = '../FrontEnd/signup.php';</script>";
        }
        else{
            // setcookie("user", $name[0], time()+3600, "/");
            echo "<script type='text/javascript'> alert('Registration successfull login :) '); window.location = '../FrontEnd/login.php';</script>";
            // header("Location: ../FrontEnd/login.php");
            // exit();
        }
    }
?>