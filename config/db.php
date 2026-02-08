<?php
$host = "localhost";
$user = "root";
$pass = "";        // default for WAMP
$db   = "prothomalo";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
