<?php  
session_start();

$titleVariable = "My Site - Sign Up";
// firstname: dummy_user,  password: PA55worD, email: dontemailme@no.no

//includes
include('includes/functions.php');
include('includes/connections.php');
include('includes/header.php');
include('includes/navbar.php');


// global variables
$newuser_name = $newuser_email = $newuser_password = "";
?>

<!--<br><br><br><br>-->
<!--cheat for navbar overhang-->
<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post"  class="form-signin form-cont text-center">

   <div class="row">
      <div class="col col-md-4 col-xs-4 col-sm-4">
         <!--            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
         <img src="#" style="height:72px;width:72px;background:black">
      </div>
      <div class="col col-md-8 col-xs-8 col-sm-8">

         <h1 class="h3 mb-3 font-weight-normal">New User Sign-Up</h1>
      </div>
   </div>

   <?php
   $fieldsList = 
      array("email" => array("inputType" => "email", 
                             "optional" => 0),
            "firstname" => array("inputType" => "text", 
                                "optional" => 0),
            "password" => array("inputType" => "password", 
                                "optional" => 0)
//						,
//            "biography" => array("inputType" => "text", 
//                                 "optional" => 1)
           );

   generateSignUpFormInputs($fieldsList); 
   ?>

   <br>

   <?php
   //form-submit checks
   if( isset( $_POST["adduser"])) {

      $conn = newConnection();
      //   echo "clicked submit...";

      $newuser_name = cleanFormData($_POST["firstname"]);
      $newuser_email = cleanFormData($_POST["email"]);
      $newuser_password = cleanFormData($_POST["password"]);
//      $newuser_bio = cleanFormData($_POST["biography"]);

      if($newuser_name && $newuser_email && $newuser_password ){
         // we don't care about the biography, it's optional anyway

         $hashedPassword = password_hash($newuser_password, PASSWORD_DEFAULT);
      
         $arrayOfValues = 
            array("firstname" => $newuser_name,
                  "email" => $newuser_email,
                  "password" => $hashedPassword
//									,
//                  "biography" => ($newuser_bio == "") ? 'null' : "'$newuser_bio'"
                 );

         if(!$conn) {
            echo "<div class='alert alert-danger'>FAIL: Database Connection Lost!</div>";
         } else {
            $insertResult = insertUser($conn, $arrayOfValues);
            if($insertResult){
               $newuser_id = getId($conn, $newuser_email);

               echo "<div class='alert alert-success'>New User Created, ID: ${newuser_id}</div>";
               setSessionInfo($newuser_name, $newuser_email, $_SESSION);
               echo "<a href='./landing_page.php' class='btn btn-success btn-lg'>Take Me To The Fun Stuff!</a><br></div>";

            } else {
               echo "<div class='alert alert-danger'>Failed to insert new user</div>";
            }
         }
      }
      mysqli_close($conn);

   } // end of "if they clicked add"
	else {
   ?>

   <input type="submit" name="adduser" class="btn btn-lg form-control btn-success" value="Sign Me Up!">
	
	<?php } ?>

</form>

<?php include('includes/footer.php'); ?>