<?php
// Start the session
session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Get input values
$user_id = $_POST['UserID'];
$facility_id = $_POST['FacilityID'];
$start_datetime = $_POST['StartDateTime'];
$end_datetime = $_POST['EndDateTime'];

// Check availability
$sql = "SELECT * FROM reservations WHERE FacilityID = ? AND (
            (StartDateTime <= ? AND EndDateTime >= ?) OR
            (StartDateTime >= ? AND StartDateTime <= ?) OR
            (EndDateTime >= ? AND EndDateTime <= ?)
        )";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssss", $facility_id, $end_datetime, $start_datetime, $start_datetime, $end_datetime, $end_datetime, $start_datetime);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reservation Status - MosqueCONNECT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .status-container {
            max-width: 600px;
            margin: auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 100px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn-home {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Status Container Start -->
    <div class="status-container">
        <?php
        if ($result->num_rows > 0) {
            // Facility is not available
            echo "<h2>Reservation Failed</h2>";
            echo "<p>Sorry, this facility is already booked during the selected time. Please choose another time.</p>";
        } else {
            // Insert reservation
            $insert_sql = "INSERT INTO reservations (UserID, FacilityID, StartDateTime, EndDateTime, Status) VALUES (?, ?, ?, ?, 'Pending')";
            $insert_stmt = $conn->prepare($insert_sql);
            if ($insert_stmt) {
                $insert_stmt->bind_param("iiss", $user_id, $facility_id, $start_datetime, $end_datetime);
                if ($insert_stmt->execute()) {
                    echo "<h2>Reservation Successful</h2>";
                    echo "<p>Your reservation has been confirmed!</p>";
                } else {
                    echo "<h2>Reservation Error</h2>";
                    echo "<p>Error: " . $insert_stmt->error . "</p>";
                }
            } else {
                echo "<h2>Reservation Error</h2>";
                echo "<p>Error preparing statement: " . $conn->error . "</p>";
            }
        }
        ?>
        <a href="reserve.php" class="btn-home">Back to Reservation</a>
    </div>
    <!-- Status Container End -->

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
