<?php 

    include("connectDB.php");
    
    function display_bybuilding($building){
        global $con;
        $query = "select * from $building";
        $result = mysqli_query($con, $query);

        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from SJT');</script>";
        }
    }
    function display_byclassno($building, $classno){
        global $con;
        $query = "select * from $building where classno='$classno'";
        $result = mysqli_query($con, $query);

        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from SJT');</script>";
        }
    }

    // function display_tt(){
    //     global $con;
    //     $query = "select * from TT";
    //     $result = mysqli_query($con, $query);

    //     if($result){
    //         return $result;
    //     }
    //     else{
    //         echo "<script type='text/javascript'>alert('error to fetch data from TT');</script>";
    //     }
    // }

    // function display_prp(){
    //     global $con;
    //     $query = "select * from PRP";
    //     $result = mysqli_query($con, $query);

    //     if($result){
    //         return $result;
    //     }
    //     else{
    //         echo "<script type='text/javascript'>alert('error to fetch data from PRP');</script>";
    //     }
    // }

    // function display_smv(){
    //     global $con;
    //     $query = "select * from SMV";
    //     $result = mysqli_query($con, $query);

    //     if($result){
    //         return $result;
    //     }
    //     else{
    //         echo "<script type='text/javascript'>alert('error to fetch data from SMV');</script>";
    //     }
    // }

    function display_all(){
        global $con;
        $query = "select * from sjt union all ";
        $query .= "select * from tt union all ";
        $query .= "select * from prp union all ";
        $query .= "select * from smv";

        $result = mysqli_query($con, $query);
        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from Database');</script>";
        }
    }

    function display($classid, $building){
        global $con;
        $query = "select * from $building where classid=$classid";

        $result = mysqli_query($con, $query);
        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from Database');</script>";
            // echo mysqli_error();
        }
    }

    function display_bydate($building, $hour, $meridien, $day){
        global $con;
        $time = $hour.":00 ".$meridien; 
        $query = "select * from $building where fromtime='$time' AND day='$day'";

        $result = mysqli_query($con, $query);
        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from Database');</script>";
            // echo mysqli_error();
        }
    }

    function display_byday($building, $day){
        global $con;
        $query = "select * from $building where day='$day'";
        $result = mysqli_query($con, $query);
        if($result){
            return $result;
        }
        else{
            echo "<script type='text/javascript'>alert('error to fetch data from Database');</script>";
            // echo mysqli_error(); 
        }
    }

?>