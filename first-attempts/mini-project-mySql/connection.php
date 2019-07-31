<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mini_project_db";

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn){
   
   die("connection failed - " . mysqli_connect_error() );
   
} //else { <- needless, we died
   
//   echo "connected successfully";



?>