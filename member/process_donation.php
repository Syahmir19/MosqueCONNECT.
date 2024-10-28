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

// Initialize message variables
$message = "";
$message_class = "";

// Process donation form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Get UserID from session
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $bank = isset($_POST['selected_bank']) ? $_POST['selected_bank'] : NULL; // Only available if bank transfer is selected
    
    // Insert donation details into the donations table
    $stmt = $conn->prepare("INSERT INTO donations (UserID, name, email, amount, method, bank, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("issdss", $user_id, $name, $email, $amount, $method, $bank);
    
    // Execute statement
    if ($stmt->execute()) {
        // Successful donation
        $message = "Donation successful. Thank you for your generosity!";
        $message_class = "success";
    } else {
        // Error occurred during donation
        $message = "Error: " . $stmt->error;
        $message_class = "error";
    }
    
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Status</title>
    <style>
        body {
            font-family: 'Lobster', sans-serif; /* Assuming you're using Lobster */
            background-color: #f5f5f5; /* A light grey background to match your theme */
            text-align: center;
            padding: 50px;
        }

        .message {
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .success {
            background-color: #28a745; /* Success green */
            color: white;
        }

        .error {
            background-color: #dc3545; /* Error red */
            color: white;
        }

        .back-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff; /* Blue button color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>

    <!-- Display message -->
    <?php if ($message): ?>
        <div class="message <?php echo $message_class; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Back to Donate Page button -->
    <br><br>
    <a href="donate.html" class="back-button">Back to Donate Page</a>

</body>
</html>
