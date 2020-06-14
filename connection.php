<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "SpiceShuttle";

  // Create connection using mysqli_connect
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection and if there is error,show the type of error
  if (!$conn) {
      echo "Connection failed: " . $conn_connect_error;
  }
?>