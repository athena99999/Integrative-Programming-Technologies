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

<form action="login_process.php" method="POST" >

<h3>LOGIN</h3>
username: <input type="text" name="username" required><br><br>
password:   <input type="password" name="password" id="passwordField" required>
 <input type="checkbox" id="showPassword">
<label for="showPassword">Show Password</label><br><br>

<button type="submit" name="loginButton">Button</button><br><br>
<a href="register.php">📝 Register</a>
</form>

<!-- Javascript: PASSWORD -->
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
