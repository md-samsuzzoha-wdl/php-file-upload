<?php
// $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
$host = "localhost";
$dbname = "file_upload";
$user = "root";
$password = "";


$dbh = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
?>