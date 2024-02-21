<!DOCTYPE html>
<html>
<head>
    <style>
        body, html {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        a {
            text-decoration: none;
            color: blue;
            cursor: pointer; 
        }

        a:hover {
            text-decoration: underline; 
        }

    </style>
</head>
<body>

<form action="register_process.php" method="POST" >

<h3>REGISTER</h3>
username:   <input type="text" name="username" required><br><br>
firstname:  <input type="text" name="firstname" required><br><br>
middlename: <input type="text" name="middlename" required><br><br>
lastname:   <input type="text" name="lastname" required ><br><br>
role:       <input type="text" name="role" required> Role 1 = student || Role 2 = admin<br><br>
password:   <input type="password" name="password" id="passwordField" required>
 <input type="checkbox" id="showPassword">
<label for="showPassword">Show Password</label><br><br>

<button type="submit" name="regButton">Button</button><br><br>
<a href="login.php">🔐Login </a>
</form>
  
<script>
    const passwordField = document.getElementById("passwordField");
    const showPasswordCheckbox = document.getElementById("showPassword");

    showPasswordCheckbox.addEventListener("change", function() {
        if (this.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    });

    passwordField.addEventListener("input", function() {
        if (this.value.length < 8) {
            this.setCustomValidity("Password must be at least 8 characters long.");
        } else {
            this.setCustomValidity("");
        }
    });
</script>

</body>
</html>
