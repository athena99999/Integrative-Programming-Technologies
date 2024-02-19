<?php
include("config.php");

if(isset($_POST["regButton"])){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $lastname = $_POST["lastname"];
}

$sql = "INSERT INTO student(username, firstname, middlename, lastname, role, password) VALUES ('$username', '$firstname', '$middlename', '$lastname', $role, '$password')";

$results = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

?>
