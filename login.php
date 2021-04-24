<?php require("includes/codebase.php"); ?>
<?php 
    if(Confirm_Login()){
        header("Location: index.php");
    } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Form</h1>
    <?php
       echo ErrorMessage();
       echo SuccessMessage();
    ?>
    <form action="includes/codebase.php" method="post">
    <input type="text" name="UserName" id="" placeholder="Enter your Username">
    <br><br>
    <input type="password" name="Password" id="" placeholder="Enter your Password">
    <br><br>
    <a href="resetpassword.php">Click here to reset password</a>
    <br>
    <p>Don't have an account? <a href="register.php">Register</a></p>
    <button type="submit" name="Login">Login</button>

    <br>
    </form>
</body>
</html>