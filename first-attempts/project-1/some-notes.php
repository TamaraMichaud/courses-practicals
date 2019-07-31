<?php
define("TITLE", "PHP Variales and Constants");
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

      <h1><?php echo TITLE; ?></h1>

      <?php

//VARIABLES ----------------------------------
      $myName = "tamara";

//CONSTANTS ----------------------------------
      define("CONSTANTVARIABLE", "value of my variable");
      //      echo "My name is $myName";
      //      echo CONSTANTVARIABLE;

//ARRAY --------------------------------------
      $user = array(
         "johndoe",
         "John Doe",
         "32"
      );

      echo "User Info Is: $user[0], $user[1], $user[2] <br><br>";
      
//ASSOCIATIVE ARRAY -------------------------
      
      
      $associativeArray = array("username" => "tamaramich");
      echo $associativeArray["username"] . "<br>";

//MULTIDIMENSIONAL ARRAYS -------------------
      
      $mdArray = array("userOne" => array("username" => "tamaramich",
                                          "fullName" => "Tamara M"),
                       "userTwo" => array("username" => "otheruser",
                                          "fullName" => "Joe Blogs")
                      );
      
      echo $mdArray["userTwo"]["fullName"] . "<br>";
      
      ?>
<!--END OF PHP-->
      
      
      <div>

         <!--         a bootstrap class! you should see a blue button-->
         <a href="" class="btn btn-primary">this is a button</a>



      </div>


      <!-- load cdn first, faster  -->
      <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
      <!-- if cdn unavailable, load local version-->
      <script src="js/jquery-3.4.1.js">window.jQuery || document.write('<script src="js/jquery-3.4.1.js"><\/script>');</script>

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="bootstrap/js/bootstrap.bundle.min.js"></script>       
      <script src="js/script.js"></script>       



   </body>
</html>