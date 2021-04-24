<?php require("includes/codebase.php"); ?>
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
    <title>Welcome to Dashboard</title>
</head>
<style>
    table, th, td{
        border-collapse: collapse;
        border:1px solid black;
        padding:10px;
    }
</style>
<body>
    <?php echo "<h1> Welcome to your dashboard " . $_SESSION["FullName"] . "</h1>"?>

    <?php
       echo ErrorMessage();
       echo SuccessMessage();
    ?>
    <br>
    Click <a href="addcourse.php">here</a>  to add a course.
    <br><br>
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Course Title</th>
                <th>Course Description</th>
                <th>Created by</th>
                <th>Action</th>
            </tr>
        </thead>
            <?php
                global $conn;
                $sql  = "SELECT * FROM courses ORDER BY id desc";
                    $stmt = $conn->query($sql);
                    $Sn = 0;
                    while ($a = $stmt->fetch()) {
                        $Id        = $a["id"];
                        $Title  = $a["title"];
                        $Description = $a["description"];
                        $User  = $a["user"];
                        $Sn++;
                        ?>
        <tbody>
            <tr>
                <td> <?php echo $Sn; ?> </td>
                <td> <?php echo $Title; ?> </td>
                <td> <?php echo $Description; ?> </td>
                <td> <?php echo $User; ?> </td>
                <td>
                    <a href="editcourse.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
                    <a href="includes/deletecourse.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a>
                </td>
            </tr>
        </tbody>
            
            <?php } ?>
            
    </table>
    <br><br>
    <form action="logout.php" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
</body>
</html>