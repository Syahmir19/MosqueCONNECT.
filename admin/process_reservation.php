<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mosque_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $facilityID = $_POST['facility'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $startDateTime = $date . ' ' . $time;

    // Insert reservation data into the database
    $sql = "INSERT INTO reservations (UserID, FacilityID, StartDateTime, Status) VALUES 
           ('1', '$facilityID', '$startDateTime', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful!";
        header("Location: reserve.html?status=success"); // Redirect after success
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
