<?php
// fetch_donations.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mosque_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donations data
$sql = "SELECT DonationID, UserID, Amount, PaymentMethod, TransactionID, Status, DonationDate FROM donations";
$result = $conn->query($sql);

$donations = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $donations[] = $row;
    }
}

// Return data as JSON
echo json_encode($donations);

// Close the connection
$conn->close();
?>
