<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>

<?php 
    if(!isset($_SESSION['username'])){
        header("location: ./login.php");
    }
?>

<script>
    function validate(){
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var pwd = document.getElementById('pwd').value;

        const emailArray = email.split("@");
        var returnVal = true;

        if(emailArray[1] != "vitstudent.ac.in"){
            document.getElementById('erroremail').innerHTML = "pls provide VIT email id";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }
        if(pwd.length < 8){
            document.getElementById('errorpwd').innerHTML = "password length must be greater then 8";
            returnVal = false;
        }
        else{
            document.getElementById('errorpwd').innerHTML = "";
        }
        return returnVal;
    }
</script>

<main>
    <div class="mx-auto m-4 col col-md-6">
        <form method="post" onsubmit="return validate();" action="../BackEnd/updateStudent.php"
            class="bg-light mx-auto p-3 rounded-3 border border-4 border-bottom-0 border-start-0 border-end-0 border-secondary shadow w-75">
            <h3 class="text-center">Profile</h3>

            <div class="mb-3 mx-auto text-center">
                <img src="../Images/student.jpg" class="rounded-circle border border-secondary border-1 w-50 h-50">
            </div>

            <input type="text" value=<?= $_SESSION['email']?> name="emailid" hidden>
            <div class="mb-3">
                <label for="username" class="form-label fw-bold">UserName: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="your name...." value=<?= $_SESSION['username']?> required>
                <span id="errorusername" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email: </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="your email...." value=<?= $_SESSION['email']?> required>
                <span id="erroremail" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label fw-bold">Password: </label>
                <input type="password" class="form-control" id="pwd" name="password" placeholder="your password...." value=<?= $_SESSION['password'] ?> required>
                <span id="errorpwd" class="text-danger"></span>
            </div>

            <button class="btn btn-secondary form-control mt-1" value="save" name="save">Save changes</button>
        </form>
    </div>
</main>

<?php require_once("../Components/footer.php"); ?>