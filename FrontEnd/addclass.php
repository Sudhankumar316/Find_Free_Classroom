<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>
<?php

    if(!isset($_SESSION) || $_SESSION['username'] != "admin"){
        header("location: ./index.php");
    }
?>


<script type="text/javascript">
    function validate(){
        var building = document.getElementById("building").value;
        var classno = document.getElementById("classno").value.toUpperCase();
        var day = document.getElementById("day").value;
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
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

        var returnVal = true;
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
    <form method="post" onsubmit="return validate();" action="../BackEnd/insertclass.php"
        class="bg-light mx-auto p-3 rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-success shadow w-75">
        <h3 class="text-center">Add New Class</h3>

        <div class="mb-3">
            <label for="building" class="form-label fs-5">Building: </label>
            <select class="form-control" id="building" name="building">
                <option value="">--Select building--</optoin>
                <option value="SJT">Silver Jubilee Tower - SJT</optoin>
                <option value="TT">Technology Tower - TT</optoin>
                <option value="PRP">Pearl Research Block - PRP</optoin>
                <option value="SMV">Sir M Viswaswera - SMV</optoin>
            </select>
            <span id="errorbuilding" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="classno" class="form-label fs-5">Class No: </label>
            <input type="text" class="form-control" id="classno" name="classno" maxlength="4" placeholder="class number...."  autocomplete="off" required>
            <span id="errorclassno" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label fs-5">Day: </label>
            <select class="form-control" id="day" name="day">
                <option value="">--Select day--</optoin>
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
                <option value="">--Select From Time--</optoin>
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
                <option value="">--Select From Time--</optoin>
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

        <button class="btn btn-success form-control mt-3">create</button>

    </form>
</div>
</main>
<?php require_once("../Components/footer.php"); ?>