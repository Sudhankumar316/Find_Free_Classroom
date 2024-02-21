<?php
    include("connectDB.php");
    
    if(isset($_GET['id'])){
        $classid = $_GET['id'];
        $building = $_GET['building'];
        echo $classid;
        echo $building;

        $query = "delete from $building where classid=$classid";
        $result = mysqli_query($con, $query);

        if($result){
            echo "<script type='text/javascript'> alert('record deleted successfully'); window.location = '../FrontEnd/adminpanel.php';</script>";
            // header("location: ../FrontEnd/adminpanel.php");
        }
        else{
            echo "<script type='text/javascript'> alert('error in deleting the record try after some time'); window.location = '../FrontEnd/adminpanel.php';</script>";
            // header("location: ../FrontEnd/adminpanel.php");
        }
    }
    
?>