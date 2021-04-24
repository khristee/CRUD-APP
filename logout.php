<?php require_once("includes/codebase.php"); ?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["FullName"]=null;
$_SESSION["UserName"]=null;
session_destroy();
header("Location:login.php");
?>
