<?php 
//destroy session
session_start();
session_unset();
session_destroy();

//clear cookies || untested - the above did what i wanted...
if(isset($_COOKIE[session_name()])) {
   //setcookie("cookie-name", "cookie-value", "time-to-be-active", "what page"); => set to empty
   setcookie( session_name(), '', time()-86400, "/");
   // wipe the session_name for 1 day across all of this site
}

$userMsg = "Please Log In";
$titleVariable = "MySite - Goodbye";

include('includes/connections.php');
include('includes/functions.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container text-center">
   <h3>Thanks for Visiting!</h3>
   <lead class="float-right">Come back soon...</lead>
</div>


<?php
include('includes/footer.php');
?>