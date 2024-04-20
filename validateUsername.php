<?php
include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'])) {
   $username = $_POST['username'];
   // echo "$username";i am getting username here
   $sql = "SELECT * FROM sign_up_details WHERE username = '$username'";
   $result = $con->query($sql);

   if ($result->num_rows > 0) {
      // Username exists
      echo 'Sorry this username already taken!';
   } else {
      // Username does not exist
      echo 'Username is available';
   }
}
?>