<?php require_once('../Components/html_head.php') ?>

<?php require_once('../Components/navbar.php') ?>

<?php
    if(isset($_SESSION['username'])){
        header("location: ./index.php");
    }
?>

<script type="text/javascript">
    function validate(){
        var email = document.getElementById('email').value;
        var pwd = document.getElementById('pwd').value;
        var cnfpwd = document.getElementById('cnfpwd').value;

        var returnVal = true;

        if(pwd.length < 8){
            document.getElementById('errorpwd').innerHTML = "minimum 8 characters needed";
            returnVal = false;
        }
        else{
            document.getElementById('errorpwd').innerHTML = "";
        }
        if(cnfpwd != pwd){
            document.getElementById('errorcnfpwd').innerHTML = "password mismatch";
            returnVal = false;
        }
        else{
            document.getElementById('errorcnfpwd').innerHTML = "";
        }

        return returnVal;
    }
</script>

<main>
<div class="mx-auto m-5 col col-md-6">
    <form method="post"  onsubmit="return validate()" action="../BackEnd/updatepwd.php"
        class="bg-light mx-auto p-3 rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-warning shadow w-75">
        <h3 class="text-center">Reset Password</h3>

        <div class="mb-3">
            <label for="email" class="form-label fs-5">Email: </label>
            <input type="text" class="form-control" id="email" name="email"  placeholder="Enter Email...." > 
            <span id="erroremail" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label fs-5">New Password: </label>
            <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password.."  required>
            <span id="errorpwd" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="cnfpwd" class="form-label fs-5">Confirm Password: </label>
            <input type="password" class="form-control" id="cnfpwd" name="cnfpassword" placeholder="Enter confirm password.."  required>
            <span id="errorcnfpwd" class="text-danger"></span>
        </div>

        <button class="btn btn-warning form-control mt-3" name="updatepwd">Update</button>

    </form>
</div>
</main>

<?php require_once('../Components/footer.php') ?>