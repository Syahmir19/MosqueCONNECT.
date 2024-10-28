<?php
// update_profile.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mosque_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$UserID = $_POST['UserID'];
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];

// Update user data
$sql = "UPDATE users SET Name = ?, Email = ?, Phone = ?, Address = ? WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $Name, $Email, $Phone, $Address, $UserID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Profile updated successfully.";
} else {
    echo "No changes made or user not found.";
}

// Close the connection
$stmt->close();
$conn->close();

// Redirect back to profile page or display success message
header("Location: profile.html");
exit();
?>
