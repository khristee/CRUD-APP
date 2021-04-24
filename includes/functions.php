<?php require_once ("db.inc.php"); ?>
<?php

function CheckUserName($UserName){
  global $conn;
  $sql    = "SELECT username FROM users WHERE username = :bbb";
  $stmt   = $conn->prepare($sql);
  $stmt->bindValue(':bbb',$UserName);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return true;
  }else {
    return false;
  }
}

function InsertValues($FullName, $UserName, $Password){
    global $conn;
    $sql = "INSERT INTO users(fullname, username, password) VALUES (:FULLname,:USERname,:word)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':FULLname',$FullName);
    $stmt->bindValue(':USERname',$UserName);
    $stmt->bindValue(':word',$Password);
    $Execute = $stmt -> execute();
    if($Execute){
    $_SESSION["SuccessMessage"]="Registration Successful. Kindly Login!";
    header("Location: ../login.php");
    } else {
    $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
    header("Location: ../register.php");
    }
    
}

function LoginCheck($UserName,$Password){
    global $conn;
    $sql = "SELECT * FROM users WHERE username=:USERname AND password=:PASSword LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':USERname',$UserName);
    $stmt->bindValue(':PASSword',$Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
     return $Found = $stmt->fetch();
    // echo "good";
    }else {
      return null;
    // echo "bad";
    }
  }

  function UserNameCheck($UserName){
    global $conn;
    $sql = "SELECT * FROM users WHERE username=:USERname";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':USERname',$UserName);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
     return true;
    }else {
      return false;
    }
  }

  function  UpdatePassword($UserName, $Password){
    global $conn;
    $sql = "UPDATE users SET password = '$Password' WHERE username ='$UserName'";
    $stmt = $conn->query($sql);
    $Result = $stmt->rowcount();
    if ($Result==1) {
        $_SESSION["SuccessMessage"]="Password Reset Successful!";
        header("Location: ../login.php");
    } 
  }

  function CourseCheck($Title){
    global $conn;
    $sql = "SELECT * FROM courses WHERE title=:TITLE";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':TITLE',$Title);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
     return true;
    // echo "good";
    }else {
      return false;
    // echo "bad";
    }
  }

  function InsertCourse($Title, $Description, $User){
    global $conn;
    $sql = "INSERT INTO courses(title, description, user) VALUES (:TITLe,:DESCRIPTIOn,:USEr)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':TITLe',$Title);
    $stmt->bindValue(':DESCRIPTIOn',$Description);
    $stmt->bindValue(':USEr',$User);
    $Execute = $stmt -> execute();
    if($Execute){
    $_SESSION["SuccessMessage"]="Course Added Successfully!";
    header("Location: ../index.php");
    } else {
    $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
    header("Location: ../addcourse.php");
    }   
}

    function Confirm_Login(){
        if (isset($_SESSION["UserId"])) {
            return true;
        }  else {
            return false;
        }
    }

function CourseEdit($Title, $Description, $editedUser, $SearchQueryParameter){
        global $conn;
        $sql = "UPDATE courses SET title = '$Title', description = '$Description', user= '$editedUser' WHERE id='$SearchQueryParameter'";
        $stmt = $conn->query($sql);
    $Result = $stmt->rowcount();
    if ($Result==1) {
        $_SESSION["SuccessMessage"]="Course edited Successfully!";
        header("Location: ../index.php");
    } 
}
?>