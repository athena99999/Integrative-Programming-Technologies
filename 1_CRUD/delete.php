<?php
$db = mysqli_connect("localhost", "root","","user_db");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$id = $_GET['id'];

$qry = "DELETE FROM user WHERE user_id = $id";

if(mysqli_query($db, $qry)){
    header('location: user.php');
}else{
    echo mysqli_error($db);
}
