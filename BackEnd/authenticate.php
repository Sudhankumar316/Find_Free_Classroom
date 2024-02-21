<?php
    session_start();
    include("connectDB.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $pwd = sha1($_POST['password']);
        
        $query = "select * from engineers where email='$email' limit 1";
        $result = mysqli_query($con, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $pwd){
                    // setcookie("user", $user_data['userName'], time()+3600, "/");
                    // echo $user_data['userName'];
                    $_SESSION['username'] = $user_data['userName'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['password'] = $user_data['password'];

                    header("Location: ../FrontEnd/index.php");
                    exit();
                }
            }
            else{
                echo "<script>alert('account doesn't exists pls signup'); window.location = '../FrontEnd/signup.php';</script>";
            }
            
        }
        echo "<script>alert('invalid credentials'); window.location = '../FrontEnd/login.php';</script>";
        
    }
?>