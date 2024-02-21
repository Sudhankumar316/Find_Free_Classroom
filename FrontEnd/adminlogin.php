<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>

<?php 
    if(isset($_SESSION['username'])){
        if($_SESSION['username'] == "admin"){
            header("location: ./adminpanel.php");
        }
        else{
            header("location: ./index.php");
        }
    }
?>

<script>
    // window.onload = function() {
    //     var recaptcha = document.forms["adminloginForm"]["g-recaptcha-response"];
    //     recaptcha.required = true;
    //     recaptcha.oninvalid = function(e) {
    //         // do something
    //         alert("Please complete the captcha");
    //     }
    // }

    function validate(){
        var email = document.getElementById('email').value;
        var pwd = document.getElementById('pwd').value;
        var pin = document.getElementById('pin').value;
        var captcha = grecaptcha.getResponse();
        if(captcha.length == 0){
            document.getElementById('errorcaptcha').innerHTML = "Pls fill the Captcha";
            return false;
        }
        else{
            document.getElementById('errorcaptcha').innerHTML = "";
        }
        if(email !== "admin@vit.ac.in"){
            alert("invalid credentials");
            return false;
        }
        else if(pwd !== "admin@FREE.123"){
            alert("invalid credentials");
            return false;
        }
        else if(pin != "9080"){
            alert("invalid credentials");
            return false;
        }
        else{
            alert("login success :)");
            return true;
        }
    }
</script>

<main>
    <div class="rounded-3 bg-warning m-3 p-3 row">
        <div class="col-md-8">
            <img src="../Images/vit_lake.jpg" class="rounded-3" width="100%" height="100%">
        </div>
        <div class="col-md-4">
            <form method="POST" id="adminloginForm" onsubmit="return validate()" action="../BackEnd/adminauth.php"
                class="mt-2 p-3 bg-light rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-primary ">
                <h3 class="text-center">Admin Login</h3>

                <div class="mb-3">
                    <label for="UserName" class="form-label">UserName: </label>
                    <input type="email" class="form-control" id="email" placeholder="your email...." required>
                    <span class="text-danger" id="erroremail"></span>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Password: </label>
                    <input type="password" class="form-control" id="pwd" placeholder="your password...." required>
                    <span class="text-danger" id="errorpwd"></span>
                </div>

                <div class="mb-3">
                    <label for="pin" class="form-label">Security Pin: </label>
                    <input type="password" class="form-control" id="pin" placeholder="your password...." required>
                    <span class="text-danger" id="errorpin"></span>
                </div>

                <div class="mb-3 mt-3">
                    <!-- <img src="captcha.php"><br/> -->
                    <label for="captcha" class="form-label">Captcha: </label>
                    <div class="g-recaptcha" 
                        data-sitekey="6LdrJxooAAAAAFE_AtUPaMz6QqqZyqAQiemrILzY">
                    </div>
                    <span class="text-danger" id="errorcaptcha"></span>

                    <!-- <input type="password" class="form-control" id="captcha" placeholder="Enter the captcha..."> -->
                </div>

                <button class="btn btn-primary form-control mt-1">Login</button>
            </form>
        </div>
    </div>
</main>



<?php require_once("../Components/footer.php"); ?>