<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>
<?php

    if(!isset($_SESSION) || $_SESSION['username'] != "admin"){
        header("location: ./index.php");
    }

    if(isset($_GET['id']) && isset($_GET['building'])){
        require_once("../BackEnd/selectall.php");

        $classid = $_GET['id'];
        $building = $_GET['building'];

        $result = display($classid, $building);
        $row = mysqli_fetch_assoc($result);

        //storing all values
        $classno = $row['classno'];
        $day = $row['day'];
        $fromtime = $row['fromtime'];
        $totime = $row['totime'];

        $classno = preg_replace('/^.*?(\d.*)$/', '$1', $classno);

        // $action = "../BackEnd/updateclass.php?id=".$classid;
    }
    else{
        echo "<script type=text/javascript>alert('invalid request'); window.location = '../FrontEnd/adminpanel.php';</script>";
    }
?>


<script type="text/javascript">
    function validate(){
        var building = document.getElementById("building").value;
        var classno = document.getElementById("classno").value.toUpperCase();
        var day = document.getElementById("day").value;
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        var returnVal = true;

        // alert(building);
        // alert(classno);
        // alert(day);
        // alert(from);
        // alert(to);

        const regex = /^\d{3}[a-zA-Z]?$/;
        var fromstart = from.split(':')[0];
        var tostart = to.split(':')[0];
        if(fromstart < 7){
            ans = parseInt(fromstart)+12;
            fromstart = ans;
        }
        if(tostart < 8){
            ans = parseInt(tostart)+12;
            tostart = ans;
        }

        
        if(building == "" || building == null){
            document.getElementById("errorbuilding").innerHTML = "pls select building";
            returnVal = false; 
        }
        else{
            document.getElementById("errorbuilding").innerHTML = "";
        }
        if(!regex.test(classno)){
            document.getElementById("errorclassno").innerHTML = "pls provide valid class no";
            returnVal = false; 
        }
        else{
            document.getElementById("errorclassno").innerHTML = "";
        }
        if(day == "" || day == null){
            document.getElementById("errorday").innerHTML = "pls select day";
            returnVal = false; 
        }
        else{
            document.getElementById("errorday").innerHTML = "";
        }
        if(from == "" || from == null){
            document.getElementById("errorfrom").innerHTML = "pls select fromTime";
            returnVal = false; 
        }
        else{
            document.getElementById("errorfrom").innerHTML = "";
        }
        if(to == "" || to == null){
            document.getElementById("errorto").innerHTML = "pls select toTime";
            returnVal = false; 
        }
        else if(tostart <= fromstart){
            document.getElementById("errorto").innerHTML = "toTime must be greater then fromTime";
            returnVal = false;
        }
        else{
            document.getElementById("errorto").innerHTML = "";
        }

        return returnVal;
    }
</script>

<main>
<div class="mx-auto m-4 col col-md-6">
    <form method="post" onsubmit="return validate();" action="../BackEnd/updateclass.php"
        class="bg-light mx-auto p-3 rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-warning shadow w-75">
        <h3 class="text-center">Edit Class Details</h3>

        <input type="hidden" name="classid" value=<?php echo $classid;?> >

        <div class="mb-3">
            <label for="building" class="form-label fs-5">Building: </label>
            <input type="text" class="form-control" id="building" name="building"  placeholder="Building name...." value=<?php echo $building;?> readonly> 
            <span id="errorbuilding" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="classno" class="form-label fs-5">Class No: </label>
            <input type="text" class="form-control" id="classno" name="classno" maxlength="4" placeholder="class number...."  autocomplete="off" value=<?php echo $classno;?> required>
            <span id="errorclassno" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label fs-5">Day: </label>
            <select class="form-control" id="day" name="day">
                <option value="<?php echo $day; ?>" selected disabled hidden><?php echo $day; ?></optoin>
                <option value="monday">Monday</optoin>
                <option value="tuesday">Tuesday</optoin>
                <option value="wednesday">Wednesday</optoin>
                <option value="thursday">Thursday</optoin>
                <option value="friday">Friday</optoin>
            </select>
            <span id="errorday" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="from" class="form-label fs-5">From Time: </label>
            <select class="form-control" id="from" name="from">
                <option value="<?php echo $fromtime; ?>" selected disabled hidden> <?php echo $fromtime; ?> </optoin>
                <option value="08:00 AM">8:00 AM</optoin>
                <option value="09:00 AM">9:00 AM</optoin>
                <option value="10:00 AM">10:00 AM</optoin>
                <option value="11:00 AM">11:00 AM</optoin>
                <option value="12:00 PM">12:00 PM</optoin>
                <option value="01:00 PM">1:00 PM</optoin>
                <option value="02:00 PM">2:00 PM</optoin>
                <option value="03:00 PM">3:00 PM</optoin>
                <option value="04:00 PM">4:00 PM</optoin>
                <option value="05:00 PM">5:00 PM</optoin>
                <option value="06:00 PM">6:00 PM</optoin>
            </select>
            <span id="errorfrom" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="to" class="form-label fs-5">To Time: </label>
            <select class="form-control" id="to" name="to">
                <option value="<?php echo $totime; ?>" selected disabled hidden> <?php echo $totime; ?> </optoin>
                <option value="09:00 AM">9:00 AM</optoin>
                <option value="10:00 AM">10:00 AM</optoin>
                <option value="11:00 AM">11:00 AM</optoin>
                <option value="12:00 PM">12:00 PM</optoin>
                <option value="01:00 PM">1:00 PM</optoin>
                <option value="02:00 PM">2:00 PM</optoin>
                <option value="03:00 PM">3:00 PM</optoin>
                <option value="04:00 PM">4:00 PM</optoin>
                <option value="05:00 PM">5:00 PM</optoin>
                <option value="06:00 PM">6:00 PM</optoin>
                <option value="07:00 PM">7:00 PM</optoin>
            </select>
            <span id="errorto" class="text-danger"></span>
        </div>

        <button class="btn btn-warning form-control mt-3" name="submit">Update</button>

    </form>
</div>
</main>
<?php require_once("../Components/footer.php"); ?>