<?php


$user = "root";
$password = "";
$DSN='mysql:host = localhost; dbname=ZuriApp';
$ConnectingDB = new PDO($DSN,'root','');

$conn = new PDO($DSN, $user, $password);
// if ($conn) {
//    echo "success";
// }

?>