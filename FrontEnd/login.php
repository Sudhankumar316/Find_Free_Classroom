<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>

<?php 
    if(isset($_SESSION['username'])){
        header("location: ./index.php");
    } 

?>

<script>
    // window.onload = function() {
    //     var recaptcha = document.forms["loginForm"]["g-recaptcha-response"];
    //     recaptcha.required = true;
    //     recaptcha.oninvalid = function(e) {
    //         // do something
    //         alert("Please complete the captcha");
    //     }
    // }

    function validate(){
        var captcha = grecaptcha.getResponse();
        var returnVal = true;
        if(captcha.length == 0){
            document.getElementById('errorcaptcha').innerHTML = "Please complete captcha";
            returnVal = false;
        }
        else{
            document.getElementById('errorcaptcha').innerHTML = "";
        }

        return returnVal;
    }
</script>


<main>
    <div class="rounded-3 bg-warning m-3 p-3 row">
        <div class="col-md-8">
            <img src="../Images/vit_mgr.jpg" class="rounded-3" width="100%">
        </div>
        <div class="col-md-4 my-auto">
            <form method="POST" id="loginForm" onsubmit="return validate()" action="../BackEnd/authenticate.php"
                class="p-3 mt-2 bg-light rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-primary ">
                <h3 class="text-center">Login</h3>

                <div class="mb-3">
                    <label for="UserName" class="form-label">UserName: </label>
                    <input type="email" class="form-control" id="UserName" name="email" placeholder="your email...." required>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Password: </label>
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="your password...." required>
                </div>

                <div class="mb-3 mt-3">
                    <!-- <img src="captcha.php"><br/> -->
                    <label for="captcha" class="form-label">Captcha: </label>
                    <div class="g-recaptcha col-md-6" 
                        data-sitekey="6LdrJxooAAAAAFE_AtUPaMz6QqqZyqAQiemrILzY">
                    </div>
                    <span id="errorcaptcha" class="text-danger"></span>

                    <!-- <input type="password" class="form-control" id="captcha" placeholder="Enter the captcha..."> -->
                </div>

                <div class="mb-3">
                    <a href="forgotpwd.php">Forgot Password?</a><br/>
                    <a href="signup.php">don't have account?</a>       
                </div>
                <button class="btn btn-primary form-control mt-1">Login</button>
            </form>
        </div>
    </div>
</main>

<?php require_once("../Components/footer.php"); ?>