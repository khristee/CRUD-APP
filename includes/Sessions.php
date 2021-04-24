<?php
session_start();

function ErrorMessage(){
  if(isset($_SESSION["ErrorMessage"])){
    $Output = "<div style='color:red;'>" ;
    $Output .= htmlentities($_SESSION["ErrorMessage"]);
    $Output .= "</div>";
    $_SESSION["ErrorMessage"] = null;
    return $Output;
  }
}
function SuccessMessage(){
  if(isset($_SESSION["SuccessMessage"])){
    $Output = "<div style='color:green;'>" ;
    $Output .= htmlentities($_SESSION["SuccessMessage"]);
    $Output .= "</div>";
    $_SESSION["SuccessMessage"] = null;
    return $Output;
  }
}

 ?>
