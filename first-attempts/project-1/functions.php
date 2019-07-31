<?php

function validateFormData($formData) {

//   print_r($formData);
   
   if ($formData == "") {
      echo "Please enter your name<br>";
   }

//   if (!$formData["email"]) {
//      echo "Please enter your email<br>";
//   }

//   return trim(stripslashes( htmlspecialchars( $formData )));
   //   return $formData;
}



function myFirstFunction(){
   $a = 0;
   do {
      echo "$a &nbsp";
      $a++;

   } while($a < 10);
}


function anotherNewFunc($arg) {

   echo "New Function!<br>";
   do {
      echo "$arg &nbsp";
      $arg--;

   }  while ($arg > 1);

   echo "<br>Deja Vu!<br>";
   myFirstFunction();

}


function someMaths($one, $two) {

   return $one + $two;   
}


function checkForClickBait() {

   // get the headline value
   $originalHeadline = strtolower($_POST["headlineOriginal"]);  


   // store array of clickbait-sounding phrases / words and their corrections
   $a = array(
      "scientists",
      "doctors"   ,
      "hate"      ,
      "you'll never believe"
   );

   $b = array(
      "some guys",
      "so-called doctors",
      "aren't threatened by",
      "you won't really be surprised by"
   );

   // replace any instances of $a with it's matching $b !
   $correctedHeadline = str_replace($a, $b, $originalHeadline);


   return array($originalHeadline, $correctedHeadline);
}
//END OF FUNCtion

function printCorrectedHeadline($orig, $new){
   echo "<br><hr>";
   echo "<strong class='text-danger'>Original Headline</strong>";
   echo "<h4>" . ucwords($orig) . "</h4>";
   echo "<hr>";
   echo "<strong class='text-success'>Corrected Headline</strong>";
   echo "<h4>" . ucwords($new) . "</h4>";

}

?>