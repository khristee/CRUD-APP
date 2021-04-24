<?php require_once("includes/codebase.php"); ?>

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
    <input type="password" name="Password1" id="" placeholder="Enter your New Password">
    <br><br>
    <input type="password" name="Password2" id="" placeholder="Confirm your New Password">
    <br><br>
    <button type="submit" name="Reset">Confirm</button>

    <br>
    </form>
</body>
</html>