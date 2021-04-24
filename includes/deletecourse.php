<?php require("codebase.php"); ?>
<?php 
    if(!Confirm_Login()){
        header("Location: ../login.php");
    } ?>
<?php
require_once("db.inc.php");
$SearchQueryParameter = $_GET['id'];
          $conn;
            $sql = "delete from courses Where id=$SearchQueryParameter";
            $Execute = $conn->query($sql);
            if ($Execute) {
              $_SESSION["SuccessMessage"]="Course Deleted Successfully!";
              header("Location: ../index.php");
            }
?>