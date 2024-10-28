<?php
// Start the session
session_start();

// Include database connection
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userID = $_POST['UserID'];
    $eventID = $_POST['EventID'];
    $participants = $_POST['Participants'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO event_bookings (UserID, EventID, Participants, BookingDateTime) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iii", $userID, $eventID, $participants);

    // Execute the statement
    if ($stmt->execute()) {
        // Success message
        $_SESSION['success'] = "Booking successful! You have reserved $participants spot(s) for the event.";
        header("Location: booking_success.php"); // Redirect to success page
        exit();
    } else {
        // Error message
        $_SESSION['error'] = "Error: Unable to complete your booking. Please try again.";
        header("Location: booking.php"); // Redirect back to booking page
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to booking page if accessed directly
    header("Location: booking.php");
    exit();
}
?>
