<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pawandb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$url = 'http://localhost/mywebsite/';
?>