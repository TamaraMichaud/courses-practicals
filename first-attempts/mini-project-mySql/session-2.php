<?php  

   //SESSIONS...
   session_start();

   echo "Do we still remember me...? <br> I am: " . $_SESSION['username'] . "<br>";

   echo "Let's check all of the variables in SESSION...<br>";
   print_r($_SESSION);

   echo "I don't want it to be me anymore... recycle time: <br>";
   $_SESSION['username'] = "newUser";
   echo "New Session Values Are: ";
   print_r($_SESSION);
   echo "<br>";

//It is good practice to clear SESSIONs on exit... can't do much about closing the browser (which generally works anyway); so offer a logout page



   // constants
   define("TITLE", "SQL and PHP");

   //includes
   include('connection.php');  
   include('functions.php');

?>

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

      <h1>Session-2</h1>


      <div class="container">
<p><a href="index-sqlqueries.php">Click Here To Go Back</a></p>


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