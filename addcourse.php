<?php require_once("includes/codebase.php"); ?>
<?php 
    if(!Confirm_Login()){
        header("Location: login.php");
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
</head>
<body>
<h1>Add New Course</h1>
    <?php
       echo ErrorMessage();
       echo SuccessMessage();
    ?>
    <br>
    <form action="includes/codebase.php" method="post">
    <input type="text" name="Title" id="" placeholder="Enter your Course Title">
    <br><br>
    <input type="text" name="Description" id="" placeholder="Enter your Course Description">
    <br><br>
    <button type="submit" name="Add">Add Course</button>

    <br>
    </form>
</body>
</html>