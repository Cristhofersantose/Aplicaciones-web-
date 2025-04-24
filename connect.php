<?php
$host = "mysql"; // nombre del servicio en docker-compose
$user = "user";
$pass = "userpass";
$db = "login";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Failed to connect DB: " . mysqli_connect_error());
}
?>
