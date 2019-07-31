<?php
session_start();

if(isset($_SESSION["loggedInUser"])) {
   $userMsg = "Hello, " . $_SESSION["loggedInUser"];

} else {
   $userMsg = "Please Log In";
   header('Location: ./index.php');
   exit();
}

$titleVariable = "MySite - Add New Client";

include('includes/header.php');
include('includes/navbar.php');
include('includes/functions.php');
include('includes/connections.php');


if(isset($_POST["add"])) {
   
// echo "<br>Execute function to add details to db...<br>";  
   $conn = newConnection();
   insertNewClient($conn, $_POST);
   closeConnection($conn);
   // do not redirect, pop up an alert and clear the form for another entry (?)
}

?>

<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="post" class="row" >
   <div class="form-group col-sm-6">
      <label for="client-name">Name *</label>
      <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="" required>
   </div>
   <div class="form-group col-sm-6">
      <label for="client-email">Email *</label>
      <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="" required>
   </div>
   <div class="form-group col-sm-6">
      <label for="client-phone">Phone</label>
      <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-address">Address</label>
      <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-company">Company</label>
      <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-notes">Notes</label>
      <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"></textarea>
   </div>
   <div class="col-sm-12">
      <a href="landing_page.php" type="button" class="btn btn-lg btn-default">Cancel</a>
      <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Client</button>
   </div>
</form>

<?php
include('includes/footer.php');
?>