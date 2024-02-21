<?php require_once("../Components/html_head.php") ?>

<?php require_once("../Components/navbar.php") ?>

<?php
    if(!isset($_SESSION['username'])){
        header("location: ./login.php");
    }

    date_default_timezone_set("Asia/Kolkata");   
    $date = date("l, d-m-Y");
    $time = date("h:i A");

    if(isset($_GET['building'])){
        // echo "<script type='text/javascript'>alert('i am working');</script>";
        require_once("../Backend/selectall.php");
        $building = strtoupper($_GET['building']);

        if(isset($_GET['day'])){
            $result = display_bydate($building, date("h"), date("A"), $_GET['day']);
        }
        else{
            $result = display_bydate($building, date("h"), date("A"), date("l"));
        }
    }
?>

<script>
    function filter(){
        var selected = document.getElementById('day').value;
        var url = window.location.href.split("&");
        window.location.replace(url[0]+"&day="+selected);
    }
</script>
<main>
    <div class="container-fluid text-center">
        <h3 class="text-primary mt-3 mb-3">Free Classes in <?= $building ?></h3>

        <div class="row">
            <div class="col input-group">
                <h5 >Filter: </h5>
                <select class="ms-1" id="day" name="day" onchange="filter();">
                    <option value="">--Select day--</optoin>
                    <option value="monday">Monday</optoin>
                    <option value="tuesday">Tuesday</optoin>
                    <option value="wednesday">Wednesday</optoin>
                    <option value="thursday">Thursday</optoin>
                    <option value="friday">Friday</optoin>
                </select>
            </div> 

            <div class="col d-flex justify-content-end fw-bolder">
                <p class="m-1 text-danger" id="time_refresh"><?= $time ?></p>
                <p class="m-1 text-danger"><?= $date ?></p>
            </div>
        </div>


        <div class="my-3 container row">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            
            <div class="card border-success m-2" style="max-width: 18rem;">
                <div class="card-body text-success">
                    <h5 class="card-title"><?= $row['classno'] ?></h5>
                    <p class="card-text"><?= $row['fromtime'] ?> - <?= $row['totime'] ?></p>
                </div>
            </div>

            <?php } ?>
        </div>

    </div>
</main>

<?php require_once("../Components/footer.php") ?>