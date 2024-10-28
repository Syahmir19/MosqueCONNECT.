<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in. Please log in first.");
}

// Database connection settings
$host = 'localhost';  // Usually 'localhost'
$dbname = 'mosque_db'; // Your database name
$username = 'root';    // Your database username
$password = '';        // Your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch the donation history for the logged-in user
$stmt = $conn->prepare("SELECT id, name, email, amount, method, bank, created_at FROM donations WHERE UserID = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if any donations exist
$donations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $donations[] = $row;
    }
} else {
    $message = "No donation history available.";
}

$stmt->close();
$conn->close();
?>
