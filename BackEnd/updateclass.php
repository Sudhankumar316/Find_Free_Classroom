<?php
    // session_start();
    include("connectDB.php");

    if(isset($_POST['submit'])){
        $classid = $_POST['classid'];
        $building = $_POST['building'];
        $classno = $building.$_POST['classno'];

        require_once("../BackEnd/selectall.php");
        $old_data = display($classid, $building);
        $row = mysqli_fetch_assoc($old_data);

        $day = (!isset($_POST['day'])) ? $row['day'] : $_POST['day'];
        $fromtime = (!isset($_POST['from'])) ? $row['fromtime'] : $_POST['from'];
        $totime = (!isset($_POST['to'])) ? $row['totime'] : $_POST['to'];
       

        echo $building." ";
        echo $classno." ";
        echo $day." ";
        echo $fromtime." ";
        echo $totime." ";
        echo $classid." ";
        $query = "update $building set classno='$classno', day='$day', fromtime='$fromtime', totime='$totime' where classid=$classid ";

        $result = mysqli_query($con, $query);

        if(!$result){
            echo "<script>alert('error to update class details'); window.history.back(); </script>";
            // echo mysqli_error();
        }
        else{
            echo "<script>alert('class updated successfully :)'); window.location = '../FrontEnd/adminpanel.php';</script>";
        }
    }
?>