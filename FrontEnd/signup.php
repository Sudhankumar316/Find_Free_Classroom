<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>

<?php 
    if(isset($_SESSION['username'])){ 
        header("location: ./index.php");
    } 

?>

<script>
    // window.onload = function() {
    //     var recaptcha = document.forms["signupForm"]["g-recaptcha-response"];
    //     recaptcha.required = true;
    //     recaptcha.oninvalid = function(e) {
    //         // do something
    //         alert("Please complete the captcha");
    //     }
    // }

    function validate() {
        var email = document.getElementById('email').value;
        const emailArray = email.split('@');
        var pwd = document.getElementById('pwd').value;
        var cnfpwd = document.getElementById('cnfpwd').value;
        var captcha = grecaptcha.getResponse();

        var returnVal = true;

        // var recaptcha = document.forms["signupForm"]["g-recaptcha-response"];
        // recaptcha.required = true;
        // recaptcha.oninvalid = function(e) {
        //     // do something
        //     document.getElementById('errorcaptcha').innerHTML = "Captcha is required";
        //     return false;
        // }

        
        if(email != '' && emailArray[1] != "vitstudent.ac.in"){
            document.getElementById('erroremail').innerHTML = "Pls provide VIT email ID";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }

        if(pwd != '' && (pwd.length <8)){
            document.getElementById('errorpwd').innerHTML = "password length must be greater then 8";
            returnVal = false;
        }
        else{
            document.getElementById('errorpwd').innerHTML = "";
        }

        if(pwd != cnfpwd && (pwd != '' && cnfpwd != '')){
            document.getElementById('errorcnfpwd').innerHTML = "password mismatch";
            returnVal = false;
        }
        else{
            document.getElementById('errorcnfpwd').innerHTML = "";
        }
        if(captcha.length == 0){
            document.getElementById('errorcaptcha').innerHTML = "Captcha is required";
            returnVal = false;
        }
        else{
            document.getElementById('errorcaptcha').innerHTML = "";
        }

        
        return returnVal;
    }
</script>

<main>
<div class="mx-auto m-4 col col-md-6">
    <form method="post" id="signupForm" onsubmit="return validate();" action="../BackEnd/register.php"
        class="bg-light mx-auto p-3 rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-primary shadow w-75">
        <h3 class="text-center">Signup</h3>

        <div class="mb-3">
            <label for="email" class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" placeholder="your email...." name="email" required>
            <span id="erroremail" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Password: </label>
            <input type="password" class="form-control" id="pwd" placeholder="your password...." name="password" required>
            <span id="errorpwd" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="cnfpwd" class="form-label">Confirm Password: </label>
            <input type="password" class="form-control" id="cnfpwd" placeholder="your password...." required>
            <span id="errorcnfpwd" class="text-danger"></span>
        </div>
        
        <div class="mb-3 mt-3">
            <label for="captcha" class="form-label">Captcha: </label>
            <div class="g-recaptcha" 
                data-sitekey="6LdrJxooAAAAAFE_AtUPaMz6QqqZyqAQiemrILzY">
            </div>
            <span id="errorcaptcha" class="text-danger"></span>

            <!-- <input type="password" class="form-control" id="captcha" placeholder="Enter the captcha..."> -->
        </div>

        <div class="mb-3">
            <a href="login.php">Already a user?</a><br/>
        </div>

        <button class="btn btn-primary form-control mt-1">Signup</button>

    </form>
</div>
</main>

<?php require_once("../Components/footer.php"); ?>