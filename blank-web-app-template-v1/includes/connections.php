<?php

function newConnection() {

   $db_server = "localhost";
   $db_username = "root";
   $db_password = "";
   $db_name = "mini_project_db";

   $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

   if(!$conn){

      die("connection failed - " . mysqli_connect_error() );
   }
   return $conn;
}

// apparently executes at end of every script
//function closeConnection() {
//   if(isset($conn)){
//      mysqli_close($conn); // good practice, should auto-close anyway but 
//   }
//}

function getPassword($conn, $email) {

   $result = mysqli_query($conn, "select password from users where lower(email) = '$email'");

   if(mysqli_num_rows($result) == 1) {

      while($row = mysqli_fetch_assoc($result) ) {
         return $row["password"]; 
      }
   }
   return "";
}


function insertUser($conn, $userInfo) {

   $query = "insert into users (id, username, password, email, signup_date, biography)
   values (null, '" . $userInfo["username"] . "', '" . $userInfo["password"] . "', '" . $userInfo["email"] . "', CURRENT_TIMESTAMP, " . $userInfo["biography"] . ")";

   if( mysqli_query($conn, $query) ) {

      return true; // success

   } else {

      return "Error: " . $query . "<br>" . mysqli_error($conn);
   }
}

function getId($conn, $user_name) {

   $result = mysqli_query($conn, "select id from users where username = '$user_name'");

   if(mysqli_num_rows($result) == 1) {

      while($row = mysqli_fetch_assoc($result) ) {
         return $row["id"]; 
      }
   }
   return "";
}

function getUser($conn, $email) {

   $result = mysqli_query($conn, "select username from users where email = '$email'");

   if(mysqli_num_rows($result) == 1) {

      while($row = mysqli_fetch_assoc($result) ) {
         return $row["username"]; 
      }
   }
   return "";
}

//function displayTableOf($conn, $result) {
//
//   if(mysqli_num_rows($result) > 0) {
//
//      echo "<table class='table table-bordered'>";
//      echo "<tr><th>id</th><th>username</th><th>email</th></tr>";
//
//      while($row = mysqli_fetch_assoc($result) ) {
//
//         //      echo $row["id"] . " - " . $row["username"];
//
//         echo "<tr><td>";
//
//         echo $row["id"] . "</td><td>" .
//            $row["username"] . "</td><td>"  .
//            $row["email"] ;
//
//         echo "</td></tr>";
//
//      }
//
//      echo "</table>";
//
//   }  else {
//
//      echo "Oops, no results!";
//   }
//
//}

?>