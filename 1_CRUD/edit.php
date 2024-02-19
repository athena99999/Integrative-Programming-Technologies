<?php
$db = new mysqli("localhost", "root", "", "user_db");

if(!$db){
        die("Error in db". mysqli_connect_error());

}else{
    $id = $_GET['id'];
    $qry = "SELECT * FROM user WHERE user_id = $id";
    $run = $db -> query($qry);
    if($run -> num_rows > 0) {
        while($row = $run -> fetch_assoc()){
            $username = $row['user_name'];
            $useremail = $row['user_email'];
            $useraddress = $row['user_address'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
<form method="post">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $username; ?>">
    <br><br>
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $useremail; ?>">
    <br><br>
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $useraddress; ?>">
    <br><br>
    <input type="submit" name="update" value="Update">
</form> 
</body>
</html>

<?php

if (isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $qry = "UPDATE user set user_name='$name', user_email='$email',
    user_address='$address' WHERE user_id = $id";
    if(mysqli_query($db, $qry)){
        header('location: user.php');
    }else{
        echo mysqli_error($db);
    }
}
?>
