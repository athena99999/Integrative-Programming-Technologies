<?php
session_start(); // Start the session

if(isset($_SESSION['firstname']) && isset($_SESSION['role'])){
    $firstname = $_SESSION['firstname'];
    $role = $_SESSION['role'];
    // Display the firstname and role
    echo "Welcome, $firstname! You are logged in as an admin.";
} else {
    // Redirect if the session variables are not set
    header("Location: login.php");
    exit();
}
?>
