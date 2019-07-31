<?php 
session_start();

if(isset($_SESSION["loggedInUser"])) {
   $userMsg = "Hello, " . $_SESSION["loggedInUser"];
   header('Location: landing_page.php');
   exit();
} else {
   $userMsg = "Please Log In";
}

$titleVariable = "MySite - Login";
$loginError = $email = "";

include('includes/connections.php');
include('includes/functions.php');

include('includes/header.php');
include('includes/navbar.php');


//form-submit checks
if( isset( $_POST["login"])) {

   $conn = newConnection();

   $email = cleanFormData($_POST["email"]);
   $password = cleanFormData($_POST["password"]);
   $stored_password = getPassword($conn, $email);

   if($stored_password == "") {
      $loginMsg = "User not found";
   } elseif(password_verify($password, $stored_password)) {

      echo "<small class='alert-success text-uppercase form-control'>Password Verified, Logging In...</small>";
      setSessionInfo(getUser($conn, $email), $email, $_SESSION);
      header('Location: landing_page.php');
      exit();

   } else {

      $loginMsg = "Password is incorrect";
   }

   $loginError = "<small class='alert alert-danger text-uppercase form-control'>$loginMsg<a class='close' data-dismiss='alert'>&times;</a></small>";

   mysqli_close($conn); 
} // end of "if they clicked login"

?>

<!--BODY TAGS INCLUDED IN HEADER-->

<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post"  class="form-signin text-center">
   <!--            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
   <img src="#" style="height:72px;width:72px;background:black">

   <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
   <label for="inputEmail" class="sr-only">Email address</label>
   <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo $email ?>" required autofocus>
   <label for="inputPassword" class="sr-only">Password</label>
   <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
   <div class="checkbox mb-3 disabled">
      <label>
         <input type="checkbox" value="remember-me" disabled> Remember me
      </label>
   </div>
   <div><?php echo $loginError ?></div>
   <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="login">Log in</button>

   <a href="signup.php" id="btn-signup" >new here? sign up</a>

</form>


<?php 
   include('includes/footer.php');
?>