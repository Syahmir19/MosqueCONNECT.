<?php
// fetch_profile.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mosque_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get UserID from query string
$UserID = isset($_GET['UserID']) ? intval($_GET['UserID']) : 0;

// Fetch user data
$sql = "SELECT UserID, Name, Email, Phone, Address, Role FROM users WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

// Return data as JSON
echo json_encode($user);

// Close the connection
$stmt->close();
$conn->close();
?>
