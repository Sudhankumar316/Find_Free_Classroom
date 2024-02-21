<?php require_once("../Components/html_head.php"); ?>

<?php require_once("../Components/navbar.php"); ?>
<?php

    if(!isset($_SESSION) || $_SESSION['username'] != "admin"){
        header("location: ./index.php");
    }

    require_once("../BackEnd/selectall.php");
    if(!isset($_POST['search']) || $_POST['building'] == ''){
        $result = display_all();
    }
    else{
        if(isset($_POST['building']) && $_POST['classno']!=''){
            $result = display_byclassno($_POST['building'], $_POST['building'].$_POST['classno']); 
        }
        else{
            $result = display_bybuilding($_POST['building']); 
        }    
    }
?>

<script>
    function deleteAlert(self){
        var id = self.getAttribute("classid");
        var building = self.getAttribute("building");
        const regex = /^[^\D]*(\D+)/;
        const match = building.match(regex);
        if (match) {
            building = building.substring(0, match.index + match[0].length);
        }
        alert("sure want to delete record "+id+" - "+building);
        window.location.replace("../BackEnd/delete.php?id="+id+"&building="+building);
    }

    function editAlert(self){
        var id = self.getAttribute("classid");
        var building = self.getAttribute("building");
        const regex1 = /^[^\D]*(\D+)/;
        const match1 = building.match(regex1);
        if (match1) {
            building = building.substring(0, match1.index + match1[0].length);
        }
        alert("sure want to edit record "+id+" - "+building);
        window.location.replace("./editclass.php?id="+id+"&building="+building);
    }
</script>


<main>
    <div class="container-fluid ">
        <h3 class="my-3 text-primary text-center">
            <?php if(!isset($_POST['building']) || $_POST['building'] == '') : ?>
                Welcome Admin!  
            <?php else : ?>
                Filtered result for building - <?= $_POST['building'] ?>
            
            <?php endif; ?>
        </h3>

        <div class="d-flex justify-content-start">
            <a href="./addclass.php" class=" btn btn-success m-2"><i class="fa-solid fa-plus"></i> Create Class</a>
        </div>

        <div class="container border border-secondary rounded my-3">
            <h5>Filters: </h5>
            <form method="POST" action="adminpanel.php">
                <div class="row">
                    
                    <div class="col">
                        <select class="form-control m-1" id="building" name="building">
                            <option value="" >--Select building--</optoin>
                            <option value="SJT">Silver Jubilee Tower - SJT</optoin>
                            <option value="TT">Technology Tower - TT</optoin>
                            <option value="PRP">Pearl Research Block - PRP</optoin>
                            <option value="SMV">Sir M Viswaswera - SMV</optoin>
                        </select>
                    </div>

                    <div class="col">
                        <input type="text" class="form-control m-1" placeholder="Enter Classno" name='classno' value="<?php if(isset($_POST['classno'])) echo $_POST['classno']; ?>">
                    </div>

                    <!-- <div class="col">
                        <select class="form-control m-1" id="day" name="day">
                            <option value="">--Select day--</optoin>
                            <option value="monday">Monday</optoin>
                            <option value="tuesday">Tuesday</optoin>
                            <option value="wednesday">Wednesday</optoin>
                            <option value="thursday">Thursday</optoin>
                            <option value="friday">Friday</optoin>
                        </select>
                    </div>
                    
                    <div class="col">
                        <select class="form-control m-1" id="from" name="from">
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
                    </div>

                    <div class="col">
                        <select class="form-control m-1" id="to" name="to">
                            <option value="">--Select To Time--</optoin>
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
                    </div> -->
                </div>

                <div class="m-2 d-flex justify-content-end">
                    <button class="btn btn-primary" value="search" name="search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </div>
            </form>
        </div>

        <table class="table table-striped table-hover table-bordered text-center shadow">
            <thead class="table-dark">
                <th>Class ID</th>
                <th>Class No</th>
                <th>Day</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Action</th>
            </thead>

            <tbody>
                <tr>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <td><?php echo $row['classid']; ?></td>
                    <td><?php echo $row['classno']; ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['fromtime']; ?></td>
                    <td><?php echo $row['totime']; ?></td>
                    <td>
                        <a class="btn btn-primary" classid="<?php echo $row['classid'];?>" building="<?php echo $row['classno'];?>" onclick="editAlert(this);"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a class="btn btn-danger" classid="<?php echo $row['classid'];?>" building="<?php echo $row['classno'];?>" onclick="deleteAlert(this);"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
                </tr>
                <?php } ?>
                
            </tbody>

        </table>
    </div>
</main>

<?php require_once("../Components/footer.php"); ?>