<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>

<?php 
    if(!isset($_SESSION['username'])){
        header("location: ./login.php");
    }
?>

<main>
    <div class="container-fluid text-center">
        <h3 class="text-primary mt-2 mb-4">Select the Building where you are</h3>

        <!-- <div class="col-md-3 rounded border border-3 border-bottom-0 border-start-0 border-end-0 border-primary
                    shadow h-100 m-0">
            <img src="../Images/vit_TT.jpeg" width="100%">
            <button class="btn btn-outline-primary">View classes</button>
        </div> -->

        <div class="row row-cols-1 row-cols-md-3">
            <div class="col d-flex align-items-stretch">
                <div class="card w-75 mx-auto shadow mb-3" >
                    <img src="../Images/vit_SJT.jpg" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5>Silver Jubilee Tower</h5>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-outline-primary" href="./view.php?building=sjt">View Classes</a>
                    </div>
                </div>
            </div>

            <div class="col d-flex align-items-stretch">
                <div class="card w-75 mx-auto shadow mb-3">
                    <img src="../Images/vit_TT.jpeg" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5>Technology Tower</h5>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-outline-primary" href="./view.php?building=tt">View Classes</a>
                    </div>
                </div>
            </div>

            <div class="col d-flex align-items-stretch">
                <div class="card w-75 mx-auto shadow mb-3">
                    <img src="../Images/vit_PRP.jpg" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5>Pearl Research Park</h5>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-outline-primary" href="./view.php?building=prp">View Classes</a>
                    </div>
                </div>
            </div>

            <div class="col d-flex align-items-stretch">
                <div class="card w-75 mx-auto shadow mb-3">
                    <img src="../Images/vit_SMV.jpg" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5>Sir M Visweswara</h5>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-outline-primary" href="./view.php?building=smv">View Classes</a>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</main>

<?php require_once("../Components/footer.php"); ?>

