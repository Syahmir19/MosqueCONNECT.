<?php
// fetch_reservations.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mosque_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reservations data
$sql = "SELECT ReservationID, UserID, FacilityID, StartDateTime, EndDateTime, Status FROM reservations";
$result = $conn->query($sql);

$reservations = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}

// Return data as JSON
echo json_encode($reservations);

// Close the connection
$conn->close();
?>
