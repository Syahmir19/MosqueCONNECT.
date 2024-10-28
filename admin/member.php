<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include('db_connection.php');

// Fetch members from the database
$sql = "SELECT UserID, Name, Email, Phone, Address, Role FROM users";
$result = mysqli_query($conn, $sql);

// Check for errors in the SQL query
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$members = array();

// Check if there are any members
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row; // Add each member to the array
    }
}

// Return the members as a JSON response
header('Content-Type: application/json');
echo json_encode($members);

// Close the database connection
mysqli_close($conn);
?>
