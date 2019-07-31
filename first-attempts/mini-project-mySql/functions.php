<?php 

function displayTableOf($result) {

   if(mysqli_num_rows($result) > 0) {

      //      echo "<br>Success! We have data....<br>";

      // how to access/print the results... (if more than one row...)

      echo "<table class='table table-bordered'>";
      echo "<tr><th>id</th><th>username</th><th>email</th></tr>";

      while($row = mysqli_fetch_assoc($result) ) {

         //      echo $row["id"] . " - " . $row["username"];

         echo "<tr><td>";

         echo $row["id"] . "</td><td>" .
            $row["username"] . "</td><td>"  .
            $row["email"] ;


         echo "</td></tr>";

      }

      echo "</table>";

   }  else {

      echo "Oops, no results!";
   }

}


function insertJackson($conn) {

   $query = "insert into users (id, username, password, email, signup_date, biography)
   values (null, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! I\'m Jackson, this is my bio')";

   //   echo "Query is: " . $query;

   if( mysqli_query($conn, $query) ) {

      return 0; // success

   } else {

      return "Error: " . $query . "<br>" . mysqli_error($conn);

   }


}

function checkFormValue($value, $title) {

   if ($value == "") {
      return "Please enter your $title<br>";
   }

}

function cleanFormData($value) {

   return trim(stripslashes( htmlspecialchars( $value )));

}

function insertUser($conn, $userInfo) {

   $query = "insert into users (id, username, password, email, signup_date, biography)
   values (null, '" . $userInfo["username"] . "', '" . $userInfo["password"] . "', '" . $userInfo["email"] . "', CURRENT_TIMESTAMP, null)";

   //   echo "Query is: " . $query;

   if( mysqli_query($conn, $query) ) {

      return 0; // success

   } else {

      return "Error: " . $query . "<br>" . mysqli_error($conn);

   }


}

?>