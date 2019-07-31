<?php
define("TITLE", "Click-Bait Corrections");
include("functions.php"); 
if(isset($_POST["fix_button"])) { 
   checkForClickBait();  // returns array of our required variables for later...
}

if(isset($_POST["samepage-submit"])) { 
   validateFormData(trim(stripslashes( htmlspecialchars( $_POST["name"] ))));  
}

?>
<!--END OF PHP FUNCTIONS-->


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

      <div class="container">

         <h1>Form Submissions</h1>

         <!-- GET || POST == super-variables-->

         <!--
POST = nothing in the address bar of the new page
GET = all in there....

they are both hash arrays of "element-name" => "element-value"

GET is no good for sensitive data, however, allows navigation back-and-forth with the data preserved
POST is better for security

-->

         <form class="form-control" action="form_after.php" method="post">
            <p>POSTed to a new page</p>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="submit" name="submit">

         </form>
         <hr>

         <!-- //$_SERVER["PHP_SELF"] == "this page" -->
         <!-- htmlspecialchars == php built-in to clean-up a call; break any hacked-in java etc (for example) from the $_SERVER[] value that a hacker may have tried in order to force a redirect to their own site / inject malware, etc -->
         <form class="form-control" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p>POSTed to Current page</p>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="submit" name="samepage-submit">

         </form>

      </div>


      <br><hr><hr><br>




      <div class="container">

         <h1>Functions & Arguments</h1>


         <?php  myFirstFunction(); ?>

         <br><hr>

         <?php  anotherNewFunc(10); 

         echo "<br>Some Maths Here... 6356 + 3459 = " . someMaths(6356, 3459);

         ?>

      </div>


      <br><hr><hr><br>


      <div class="container">

         <h1><?php echo TITLE; ?></h1>

         <p class="lead">Hate click bait? Turn those annoying headlines into realistic and honest ones using this simple program.</p>

         <div class="row">
            <form id="headlineEntryForm" class="col-sm-8 offset-2" method="post" action="">

               <textarea name="headlineOriginal" class="form-control input-lg" placeholder="Paste headline here"></textarea>
               <br>
               <button name="fix_button" class="btn btn-primary float-right" type="submit">Fix that headline!</button>
            </form>

         </div>

         <?php 
         //         NON-SPAGHETTI!!
         if(isset( $_POST["fix_button"])) {   

            $originalHeadline = checkForClickBait()[0];
            $correctedHeadline = checkForClickBait()[1];

            printCorrectedHeadline($originalHeadline, $correctedHeadline);
         }
         ?>

      </div>
      <br><hr><hr><br>
      <div class="container">

         <!--         LOOPS-->
         <?php 

         //         FOR
         for ($i = 0 ; $i < 6; $i++) {

            echo "This Is FOR-Loop iteration number: $i <br>";
         }

         //         FOREACH
         $people = array("joe", "jim", "janet", "jill");
         foreach( $people as $person) {

            echo "$person has arrived! <br>";
         }

         //WHILE / DO-WHILE

         //while - may never execute
         $a = 0;
         while($a < 6) {
            echo "While loop number: $a <br>";
            $a++;
         }



         //do-while - always executes at least once
         do {

            echo "Do-While Loop Number: $a <br>";
            $a--;
         } while ($a > 1);



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