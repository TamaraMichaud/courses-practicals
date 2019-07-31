<?php
      if(!isset($_SESSION["loggedInUser"])) {
         header("Location: index.php");  
      }

?>

<h1>Client Address Book</h1>

<table class="table table-striped table-bordered">
   <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Company</th>
      <th>Notes</th>
      <th>Edit</th>
   </tr>

   <?php
   $conn = newConnection();
   displayTableOf($conn, getClientInfo($conn, null));
   closeConnection($conn);
   
//   header("Location: landing_page.php");
   ?>

   <tr>
      <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
   </tr>
</table>

<!--
<?php
//include('includes/footer.php');
?>-->
