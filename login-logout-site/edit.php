<?php
session_start();

if(isset($_SESSION["loggedInUser"])) {
   $userMsg = "Hello, " . $_SESSION["loggedInUser"];

} else {
   $userMsg = "Please Log In";
   header('Location: ./index.php');
   exit();
}

$titleVariable = "MySite - Edit Client";

include('includes/header.php');
include('includes/navbar.php');
include('includes/connections.php');


//   echo "<div class='alert alert-danger'>Client not found <a href='landing_page.php'>Head back</a>.</div>";

$id = (isset($_GET["id"])) ? $_GET["id"] : $_POST["id"];

$conn = newConnection();

$clientDetails = mysqli_fetch_assoc(getClientInfo($conn, $id));



if ( isset($_POST["update"])) {
   updateClientInfo($conn, $_POST, $id);
//   echo "<div class='alert alert-warning'>Record Updated</div>";
}

if ( isset($_POST["delete"])) {
   deleteClient($conn, $id);
   echo "<div class='alert alert-warning'>Record Deleted</div>";
}

closeConnection($conn);

?>

<h1>Edit Client - <?php echo $id ?></h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="post" class="row">
   <input type="hidden" value="<?php echo $id ?>" name="id">
   <div class="form-group col-sm-6">
      <label for="client-name">Name</label>
      <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="<?php echo $clientDetails["name"] ?>">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-email">Email</label>
      <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientDetails["email"] ?>">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-phone">Phone</label>
      <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientDetails["phone"] ?>">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-address">Address</label>
      <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientDetails["address"] ?>">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-company">Company</label>
      <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="<?php echo $clientDetails["company"] ?>">
   </div>
   <div class="form-group col-sm-6">
      <label for="client-notes">Notes</label>
      <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"><?php echo $clientDetails["notes"] ?></textarea>
   </div>
   <div class="col-sm-12">
      <hr>
      <button type="submit" class="btn btn-lg btn-danger float-left" name="delete">Delete</button>
      <div class="float-right">
         <a href="landing_page.php" type="button" class="btn btn-lg btn-default">Cancel</a>
         <button type="submit" class="btn btn-lg btn-success" name="update">Update</button>
      </div>
   </div>
</form>

<?php
   include('includes/footer.php');
?>