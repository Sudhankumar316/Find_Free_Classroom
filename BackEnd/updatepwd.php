<?php
    include("connectDB.php");

    if(isset($_POST['updatepwd'])){
        $email = $_POST['email'];
        $pwd = sha1($_POST['password']);

        $selectQuery = "select userName from engineers where email='$email' limit 1";
        $result = mysqli_query($con, $selectQuery);
        
        if($result){

            if(mysqli_num_rows($result) == 0){
                echo "<script type='text/javascript'> alert('account does not exists try to signup'); window.location = '../FrontEnd/signup.php';</script>";
            }
        
            else if(mysqli_num_rows($result) > 0){
                $updateQuery = "update engineers set password='$pwd' where email='$email'";
                $result = mysqli_query($con, $updateQuery);
                
                if($result){
                    echo "<script>alert('password updated try to login :) '); window.location = '../FrontEnd/login.php';</script>";
                }
                else{
                    echo "<script>alert('error to update password'); window.location = '../FrontEnd/forgotpwd.php';</script>";
                }
            } 
        }
        else{
            echo "<script>alert('error to update password'); window.location = '../FrontEnd/signup.php'; window.location = '../FrontEnd/forgotpwd.php';</script>";
        }
    }
?>