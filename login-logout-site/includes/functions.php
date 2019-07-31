<?php 
function setSessionInfo($username, $email, $session) {   
   
   $_SESSION["loggedInUser"] = $username;
   $_SESSION["loggedInEmail"] = $email;
   return $_SESSION;
}

function checkFormValue($value, $title) {

   if ($value == "") {
      return "Please enter $title<br>";
   }

}

function cleanFormData($value) {

   return trim(stripslashes( htmlspecialchars( strip_tags( str_replace( array ( '(', ')' ), '', $value ), ENT_QUOTES))));
   //replace this array of values (open and close brackets in this case just to be confusing...), with nothing
   // trip_tags(x, ENT_QUOTES) => replace any quotes with the html-quote-tag
}


function generateSignUpFormInputs($fieldsArray) {

   //array = [fieldname] => inputType => [text/email etc], 
   //                       optional => 0/1

   foreach($fieldsArray as $fieldname => $attributes ) {

      $input = $attributes["inputType"];
      $optional = $attributes["optional"];
      $focus = ($fieldname == "email") ? " autofocus " : "";

      $smallHtml = "<small class='small-warnings alert-danger text-uppercase form-text text-muted'>** required";

      $inputHtml = "<input type='${input}' name='${fieldname}' " .
         "id='input${fieldname}' class='form-control' " . "placeholder='${fieldname}'";

      $labelHtml = '<label for="input' . $fieldname . '"' . 
         'class="sr-only">' . $fieldname .
         '</label>';

      if($optional == 0 ) { 

         $required = " required "; 
         $closeTags = "></small>";

         // the html to output on screen
         echo $smallHtml . $labelHtml . $inputHtml . $required .
            $focus . $closeTags;
      }
      else {

         $closeTags = ">";
         echo "<br>" . $labelHtml . $inputHtml . $closeTags;
      }
   }
}


?>