<?php
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "mosque_db"; // Database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>