<header>
   <!-- Fixed navbar -->
   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="./index.php">My Exciting Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto">

    <?php if(isset($_SESSION["loggedInUser"])) {
    ?>   
            <li class="nav-item">
               <a class="nav-link" href="add.php">Add Client <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="landing_page.php">View Clients</a>
            </li>
         </ul>
         <p class="nav-item text-white pr-5 text-muted"><?php echo $userMsg . "!" ?></p>
         <a href="./logout.php" id="button-logout" class="btn" type="button">Log Out</a>


    <?php } else { ?>

            <li class="nav-item">
               <a class="nav-link disabled" href="add.php">Add Client <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="landing_page.php" disabled>View Clients</a>
            </li>
         </ul>
       <a href="index.php" id="button-logout" class="btn" type="button">Log In</a>
            
    <?php      } 
    ?>

      </div>
   </nav>
</header>