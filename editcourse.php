<?php require_once("includes/codebase.php"); ?>
<?php 
    if(!Confirm_Login()){
        header("Location: login.php");
    }
    $SearchQueryParameter = $_GET['id']; ?>
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
       global $conn;
       $sql  = "SELECT * FROM courses WHERE id='$SearchQueryParameter'";
       $stmt = $conn ->query($sql);
       while ($DataRows=$stmt->fetch()) {
         $TitleToBeUpdated    = $DataRows['title'];
         $descriptionToBeUpdated = $DataRows['description'];
       }
    ?>
    <br>
    <form action="includes/codebase.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
    <input type="text" name="editedTitle" id="" placeholder="Enter your Course Title" value="<?php echo $TitleToBeUpdated; ?>">
    <br><br>
    <input type="text" name="editedDescription" id="" placeholder="Enter your Course Description" value="<?php echo $descriptionToBeUpdated; ?>">
    <br><br>
    <button type="submit" name="Edit">Edit Course</button>

    <br>
    </form>
</body>
</html>