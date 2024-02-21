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

$check_qry = "SELECT * FROM student WHERE username = '$username'";
$result = $conn->query($check_qry);

if($result->num_rows > 0){
    echo "<script>alert('Balik2x mana imo username uy 😡'); window.location.href = 'register.php';</script>";
}else{
    $sql = "INSERT INTO student(username, firstname, middlename, lastname, role, password) VALUES('$username', '$firstname', '$middlename', '$lastname', '$role', '$password')";
    if($conn->query($sql)=== TRUE){
        echo "<script>alert('New record created successfully'); window.location.href = 'login.php';</script>";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!-- 

$sql = "INSERT INTO student(username, firstname, middlename, lastname, role, password) VALUES ('$username', '$firstname', '$middlename', '$lastname', $role, '$password')";
 
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully'); window.location.href = 'login.php';</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  } -->
