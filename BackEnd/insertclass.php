<?php
    session_start();
    include("connectDB.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $building = $_POST['building'];
        $classno = $building.$_POST['classno'];
        $day = $_POST['day'];
        $fromtime = $_POST['from'];
        $totime = $_POST['to'];

        $query = "insert into $building (classno, day, fromtime, totime) values ('$classno', '$day', '$fromtime', '$totime')";

        $result = mysqli_query($con, $query);

        if(!$result){
            // echo "<script type='text/javascript'> alert('error to add class')</script>";
            // header("location: ../FrontEnd/addclass.php");
            echo "<script>alert('error to add class'); window.location = '../FrontEnd/addclass.php';</script>";
        }
        else{
            // echo "<script type='text/javascript'> alert('class added successfully :)')</script>";
            // header("location: ../FrontEnd/adminpanel.php");
            echo "<script>alert('class added successfully :)'); window.location = '../FrontEnd/adminpanel.php';</script>";
        }
    }
?>