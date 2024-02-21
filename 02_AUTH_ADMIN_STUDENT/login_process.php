<?php
include("config.php");

if(isset($_POST["loginButton"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Check if the username and password match a record in the database
    $check_qry = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($check_qry);

    if($result->num_rows > 0){
        // Fetch the user data
        $row = $result->fetch_assoc();
        $firstname = $row["firstname"];
        $role = $row["role"];
        
        // Start a session and store the firstname and role in session variables
        session_start();
        $_SESSION['firstname'] = $firstname;
        $_SESSION['role'] = $role;

        // Redirect based on the role
        if($role == 1){
            header("Location: student_crud.php");
            exit();
        } elseif($role == 2){
            header("Location: admin_crud.php");
            exit();
        } else {
            // Role not recognized
            echo "<script>alert('No role exist'); window.location.href = 'login.php';</script>";

        }
    } else {
        // Invalid username or password
        echo "<script>alert('Invalid Credentialss'); window.location.href = 'login.php';</script>";

    }
}
?>
