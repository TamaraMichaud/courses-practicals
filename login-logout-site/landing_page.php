<?php 
session_start();

if(isset($_SESSION["loggedInUser"])) {
   $userMsg = "Hello, " . $_SESSION["loggedInUser"];
} else {
   $userMsg = "Please Log In";
   header('Location: index.php');
   exit();
}

$titleVariable = "MySite";

include('includes/connections.php');
include('includes/functions.php');

include('includes/header.php');
include('includes/navbar.php');

if(isset($_GET["alert"])) {

   $message = $class = "";
   switch($_GET["alert"]) {

      case "add-success":
         $message = "New Client Added!";
         $class = "success";
         break;
      case "edit-success":
         $message = "Client Updated";
         $class = "success";
         break;
      case "del-success":
         $message = "Client Deleted";
            $class = "warning";
         break;
   }

   echo "<div class='alert alert-$class'>$message <a class='close' data-dismiss='alert'>&times;</a></div>";
}

?>


<!--<div class="container text-center">-->

<!--
<h2>Hello <?php echo $_SESSION["loggedInUser"] ?>!</h2>
<br><hr><br>
<p>How do you want to proceed?</p>
<a href="add.php">Add</a>
<a href="edit.php">Edit</a>
<a href="clients.php">View</a>
-->
<?php include('clients.php'); ?>

</div>


<?php
include('includes/footer.php');
?>