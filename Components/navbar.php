<?php 
    if(!isset($_SESSION)){session_start(); }
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid text-center">
          <?php if(!isset($_SESSION['username']) || $_SESSION['username'] != "admin") : ?>
            <a href="../FrontEnd/index.php">
              <img src="../Images/vitlogo2.png" height="80" width="250" class="rounded-3">
            </a>
          <?php else : ?>
            <a href="../FrontEnd/adminpanel.php">
              <img src="../Images/vitlogo2.png" height="80" width="250" class="rounded-3">
            </a>
          
          <?php endif; ?>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav me-3 ms-auto float-end">
              <a class="nav-link mx-3" href="../FrontEnd/index.php">Home</a>
              
              <?php if(!isset($_SESSION['username'])) : ?>
                <a class='nav-link mx-3' href='../FrontEnd/login.php'>Login</a>
                <a class='nav-link mx-3' href='../FrontEnd/signup.php'>Signup</a>

              <?php else : ?>
                  
                <div class='dropdown mx-3'>
                  <button class='me-4 btn btn-dark dropdown-toggle' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' data-bs-toggle='dropdown' aria-expanded='false'>
                    <?php echo $_SESSION['username']; ?>
                  </button>
                  <div class='dropdown-menu text-dark' aria-labelledby='dropdownMenu2'>
                    <?php if($_SESSION['username'] != "admin") : ?>
                      <a class='dropdown-item' href='./profile.php'>Profile</a>
                      <a class='dropdown-item' href='./logout.php'>Logout</a>
                    
                    <?php else :?>
                      <a class='dropdown-item' href='./logout.php'>Logout</a>
                    
                    <?php endif; ?>
                  </div>
                </div>
              
              <?php endif; ?>

            </div>
          </div>
        </div>
    </nav>