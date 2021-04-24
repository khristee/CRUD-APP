<?php require("db.inc.php"); ?>
<?php require("functions.php"); ?>
<?php require("Sessions.php"); ?>

<?php

if (isset($_POST['Register'])) {
    $FullName = $_POST['FullName'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password1'];
    $Password2 = $_POST['Password2'];
    if (empty($FullName) || empty($UserName) || empty($Password) || empty($Password2)) {
        $_SESSION["ErrorMessage"] = "All input fields cannot be empty";
        header("Location:../register.php");
    } elseif (CheckUserName($UserName)) {
        $_SESSION["ErrorMessage"]= "Username Already Exist. Try Another One! ";
        header("Location: ../register.php");
    } elseif (strlen($Password)<4) {
        $_SESSION["ErrorMessage"]= "Password should be 4 characters and above ";
        header("Location: ../register.php");
    } elseif ($Password != $Password2) {
        $_SESSION["ErrorMessage"]= "Passwords do not match";
        header("Location: ../register.php");
    } else {
      InsertValues($FullName, $UserName, $Password);
    }
}

if (isset($_POST['Login'])) {
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    if (empty($UserName) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "Username or password cannot be empty";
        header("Location:../login.php");
    } else {
       $Found = LoginCheck($UserName,$Password);
       if ($Found) {
        $_SESSION["UserId"] = $Found["id"];
        $_SESSION["FullName"] = $Found["fullname"];
        $_SESSION["UserName"] = $Found["username"];
        header("Location:../index.php");
        // echo "good";
       } else {
        $_SESSION["ErrorMessage"] = "Invalid Username or Password ";
        header("Location:../login.php");
        // echo "bad";
       }
    }
}

if (isset($_POST['Reset'])) {
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password1'];
    $Password2 = $_POST['Password2'];
    if (empty($UserName) || empty($Password) || empty($Password2)) {
        $_SESSION["ErrorMessage"] = "All fields cannot be empty";
        header("Location:../resetpassword.php");
    } else if(!UserNameCheck($UserName)) {
        $_SESSION["ErrorMessage"] = "Invalid Username";
        header("Location:../resetpassword.php");
    } elseif ($Password != $Password2) {
        $_SESSION["ErrorMessage"]= "Passwords do not match";
        header("Location: ../resetpassword.php");
    } elseif (strlen($Password)<4) {
        $_SESSION["ErrorMessage"]= "Password should be 4 and above characters";
        header("Location: ../resetpassword.php");
    } else {
      UpdatePassword($UserName, $Password);
    }
}

if (isset($_POST['Add'])) {
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $User = $_SESSION["UserName"];
    if (empty($Title) || empty($Description)) {
        $_SESSION["ErrorMessage"] = "All fields cannot be empty";
        header("Location:../addcourse.php");
    } else if(CourseCheck($Title)) {
        $_SESSION["ErrorMessage"] = "Course title already exist";
        header("Location:../addcourse.php");
    } else {
        InsertCourse($Title, $Description, $User);
    }
}

if (isset($_POST['Edit'])) {
    $SearchQueryParameter = $_GET['id'];
    $Title = $_POST['editedTitle'];
    $Description = $_POST['editedDescription'];
    $editedUser = $_SESSION["UserName"];
    if (empty($Title) || empty($Description)) {
        $_SESSION["ErrorMessage"] = "All fields cannot be empty";
        header("Location:../editcourse.php?id=<?php echo $SearchQueryParameter; ?");
    } else {
        CourseEdit($Title, $Description, $editedUser, $SearchQueryParameter);
    }
}
?>