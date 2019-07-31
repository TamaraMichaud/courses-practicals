<?php 
session_start();

$titleVariable = "MySite";
$loggedInUser = $_SESSION['loggedInUser'];

include('includes/connections.php');
include('includes/functions.php');

include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container text-center">

   <h2>Hello <?php echo $loggedInUser ?>!</h2>

</div>


<?php
include('includes/footer.php');
?>