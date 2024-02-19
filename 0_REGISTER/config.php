<?php 

$conn = mysqli_connect("localhost", "root", "", "student");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?>
