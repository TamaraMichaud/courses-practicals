<?php

function newConnection() {

   $db_server = "localhost";
   $db_username = "root";
   $db_password = "";
   $db_name = "db_clientaddressbook";

   $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

   if(!$conn){

      die("connection failed - " . mysqli_connect_error() );
   }
   return $conn;
}

// apparently executes at end of every script
function closeConnection($conn) {
   //   if(isset($conn)){
   mysqli_close($conn); // good practice, should auto-close anyway but 
}
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

   $query = "insert into users (id, name, /*username,*/ password, email /*, signup_date, biography*/)
   values (null, '" . $userInfo["name"] . "', '" . $userInfo["password"] . "', '" . $userInfo["email"] . "'";
   //   , CURRENT_TIMESTAMP, " . $userInfo["biography"] . ")";

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

   $result = mysqli_query($conn, "select name from users where email = '$email'");

   if(mysqli_num_rows($result) == 1) {

      while($row = mysqli_fetch_assoc($result) ) {
         return $row["name"]; 
      }
   }
   return "";
}


function insertNewClient($conn, $clientInfoArray) {

   $name    = "'" . $clientInfoArray["clientName"] . "'";
   $email   = "'" . $clientInfoArray["clientEmail"] . "'";
   $phone   = "'" . $clientInfoArray["clientPhone"] . "'";
   $address = "'" . $clientInfoArray["clientAddress"] . "'";
   $company = "'" . $clientInfoArray["clientCompany"] . "'";
   $notes   = "'" . $clientInfoArray["clientNotes"] . "'";

   $phone = ($phone == '') ? "null" : $phone;
   $address = ($address == '') ? "null" : $address;
   $company = ($company == '') ? "null" : $company;
   $notes = ($notes == '') ? "null" : $notes;

   $query = "insert into clients (id, name, email, phone, address, company, notes, date_added)
   values (null, $name, $email, $phone, $address, $company, $notes, CURRENT_TIMESTAMP)";

   if( mysqli_query($conn, $query) ) {

      header("Location: landing_page.php?alert=add-success");
      return true; // success (mooted by above header maybe?)

   } else {
      return "Error: " . $query . "<br>" . mysqli_error($conn);
   }
}


function getClientInfo($conn, $client_id) {

   $query = ($client_id) ? "where id = '$client_id'" : "";

   $result = mysqli_query($conn, "select * from clients $query");

   if(mysqli_num_rows($result) >= 1) {

      return $result;
   }
   return "";   
}

function displayTableOf($conn, $clientInfo) {

   if($clientInfo != null && mysqli_num_rows($clientInfo) > 0) {

      while($row = mysqli_fetch_assoc($clientInfo) ) {

         echo "<tr><td>";
         echo $row["name"] . "</td><td>" .
            $row["email"] . "</td><td>"  .
            $row["phone"] . "</td><td>"  .
            $row["address"] . "</td><td>"  .
            $row["company"] . "</td><td>"  .
            $row["notes"] . "</td><td>"  .
            '<a href="edit.php?id=' . $row["id"] . '" type="button" class="btn btn-default btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>' ;
         echo "</td></tr>";
      }
   }  else {
      echo "<tr><td colspan=7>You have no clients currently</td></tr>";
   }
}

function updateClientInfo($conn, $clientInfoArray, $clientId) {

   $name    = "'" . $clientInfoArray["clientName"] . "'";
   $email   = "'" . $clientInfoArray["clientEmail"] . "'";
   $phone   = "'" . $clientInfoArray["clientPhone"] . "'";
   $address = "'" . $clientInfoArray["clientAddress"] . "'";
   $company = "'" . $clientInfoArray["clientCompany"] . "'";
   $notes   = "'" . $clientInfoArray["clientNotes"] . "'";

   $phone = ($phone == '') ? "null" : $phone;
   $address = ($address == '') ? "null" : $address;
   $company = ($company == '') ? "null" : $company;
   $notes = ($notes == '') ? "null" : $notes;

   $query = "update clients
             set  name = $name,
                  email = $email,
                  phone = $phone,
                  address = $address, 
                  company = $company,
                  notes = $notes
             where id = $clientId";

   if( mysqli_query($conn, $query) ) {

      header("Location: landing_page.php?alert=edit-success");
      return true; // success (mooted by above header maybe?)

   } else {
      return "Error: " . $query . "<br>" . mysqli_error($conn);
   }
}

function deleteClient($conn, $clientId) {

   if(mysqli_query($conn, "delete from clients where id = $clientId")) {
      header("Location: landing_page.php?alert=del-success");
   } else {
      echo "Error: " . $quert . "<br>" . mysqli_error($conn);
   }

}

?>