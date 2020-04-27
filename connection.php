<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "blogger";

// Create connection
$con = new mysqli($servername, $username, $password,$db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>