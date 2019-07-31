<?php  
//SESSIONS...
session_start();
$_SESSION['username'] = "tamara";
$_SESSION['email'] = "tamara@email.com";

echo "SESSION IS ACTIVE<br>";







define("TITLE", "SQL and PHP");

//includes
include('connection.php');  
include('functions.php');

// global variables
$nameError = $emailError = $pwdError = "";
$name = $email = $password = "";

//sql-queries
//$query = "select * from users /*where lower(username) like '%mich%'*/";

//$result = mysqli_query($conn, $query);
// ^^ this is a multi-dimensional associative array, so, to access these values, loop the rows and pull values from row[x]


//form-submit checks
if( isset( $_POST["add"])) {
   //   echo "clicked submit...";
   //   $flagError = 0;

   if(! $_POST["username"]) {
      $nameError = checkFormValue($_POST["username"], "username");
      //      $flagError = 1;
   }
   else {
      $name = cleanFormData($_POST["username"]);
   }

   if(! $_POST["email"]) {
      $emailError = checkFormValue($_POST["email"], "email");
      //      $flagError = 1;
   }
   else {
      $email = cleanFormData($_POST["email"]);
   }

   if(! $_POST["password"]) {
      $pwdError = checkFormValue($_POST["password"], "password");
      //      $flagError = 1;
   }
   else {
      $password = cleanFormData($_POST["password"]);
   }

   if($username && $email && $password ){

      //HASHING VALUES FOR SECURITY!!!
      $email = password_hash($email, PASSWORD_DEFAULT);
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // this doesn't really belong here; it would be if I was logging in; and "password" should come from the db
      if(password_verify($password, $hashedPassword)) {

         echo "<br>PASSWORD IS CORRECT<br>";
         echo "The Hashed Email Is: $email <br>";
         echo "The Hashed Password Is: $password <br>";

         $arrayOfValues =  array("username" => $name,
                                 "email" => $email,
                                 "password" => $password);
         insertUser($conn, $arrayOfValues);
         echo "<div class='alert alert-success'>New User Inserted Successfully</div>";


      } else {
         echo "Incorrect Password: " . $password . " - hashed = " . $hashedPassword;
      }

   }


} // end of "if they clicked add"


?>

<!---->
<!--END OF PHP start of HTML-->
<!---->


<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- The above 2 meta tags *must* come first in the head
name: viewport is what makes your site responsive -->

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!--        <link rel="stylesheet" href="css/normalize.css">-->
      <link rel="stylesheet" href="css/style.css">

      <link href="js/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">

      <!--[if IE]>
<script 
src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


      <title><?php echo TITLE; ?></title>

   </head>

   <body>

      <h1>Testing SESSION</h1>
      <div class="container">
         <p><a href="session-2.php">Click Here To Change Page</a></p>
         <p><a href="logout.php">Click Here To Log Out</a></p>


         <br><hr><br>

         <div class="container">
            <br><h1>Add New User</h1><br>
            <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
               <p class="text-danger">* Required fields</p>

               <small class="text-danger">* <?php echo $nameError; ?></small>
               <input type="text" placeholder="Username" name="username">
               <br><br>

               <small class="text-danger">* <?php echo $emailError; ?></small>
               <input type="text" placeholder="Email" name="email">
               <br><br>


               <small class="text-danger">* <?php echo $pwdError; ?></small>
               <input type="password" placeholder="Password" name="password">
               <br><br>

               <input type="submit" name="add" value="Add Entry">
            </form>

            <hr>
            <div class="container">


               <?php 

               if($username && $email && $password) {

                  $sqlQuery = "SELECT * from users where username = '$name'";

                  $resultSet = mysqli_query($conn, $sqlQuery);
                  if($resultSet == "") {
                     echo "Woopsie Something's gone awry";
                  } else {
                     echo "<h4>New User Info</h4>";
                     displayTableOf($resultSet);
                  }
               }
               mysqli_close($conn); // good practice, should auto-close anyway but 
               ?>


            </div>




            <?php  
            //
            //         if(insertJackson($conn) == "0") {
            //            // record inserted successfully, so print the table
            //            displayTableOf($result);  
            //         } else {
            //            echo "WOOPSIE!!!";
            //            echo insertJackson($conn);
            //         }
            //         mysqli_close($conn); // good practice, should auto-close anyway but 
            //
            //

            ?>


         </div>



         <!-- load cdn first, faster  -->
         <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
         <!-- if cdn unavailable, load local version-->
         <script src="js/jquery-3.4.1.js">window.jQuery || document.write('<script src="js/jquery-3.4.1.js"><\/script>');</script>

         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

         <script src="bootstrap/js/bootstrap.bundle.min.js"></script>  <!-- SWAP THIS OUT FOR THE CDN to save requiring it locally -->
         <script src="js/script.js"></script>       






         </body>
      </html>