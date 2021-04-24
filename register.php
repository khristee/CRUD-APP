<?php require_once("includes/codebase.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <h1>Registration Form</h1>
    <?php
       echo ErrorMessage();
       echo SuccessMessage();
    ?>
    <br>
    <form action="includes/codebase.php" method="post">
    <input type="text" name="FullName" id="" placeholder="Enter your Full Name">
    <br><br>
    <input type="text" name="UserName" id="" placeholder="Enter your Username">
    <br><br>
    <input type="password" name="Password1" id="" placeholder="Enter your Password">
    <br><br>
    <input type="password" name="Password2" id="" placeholder="Confirm your Password">
    <br><br>
    <button type="submit" name="Register">Register</button>

    <br>
    </form>
</body>
</html>