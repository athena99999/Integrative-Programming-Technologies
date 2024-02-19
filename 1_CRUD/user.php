<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
</head>
<body>

<form method="post">
    <label>Name</label>
    <input type="text" name="name" placeholder="Enter Name">
    <br><br>
    <label>Email</label>
    <input type="email" name="email" placeholder="Enter Email">
    <br><br>
    <label>Address</label>
    <input type="text" name="address" placeholder="Enter Address">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<hr>
<h3>User list</h3>
<table style="width: 80%" border="1">
    <tr>
        <th>S#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Operations</th>
    </tr>
    <?php
    $i = 1;

    $db = new mysqli("localhost", "root", "", "user_db");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $qry = "select * from user";
    $run = $db->query($qry);

    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id = $row['user_id']
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['user_email'] ?></td>
                <td><?php echo $row['user_address'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $id; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Happy Birthday Alicia')">Delete</a>
             
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $qry = "INSERT INTO user VALUES(null, '$name', '$email', '$address')";
    if ($db->query($qry)) {
        echo '<script>alert("User registered successfully.");</script>';
        header('location: user.php');
    } else {
        echo $db->error;
    }
}
?>
