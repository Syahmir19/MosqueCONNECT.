<?php
// Include your database connection
include('db_connection.php');

// Fetch the event ID from the URL
if (isset($_GET['EventID'])) {
    $eventID = $_GET['EventID'];

    // Fetch the event details from the database
    $query = "SELECT * FROM events WHERE EventID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if event is found
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "Event not found.";
        exit;
    }

    // If the form is submitted, update the event
    if (isset($_POST['update'])) {
        // Get the updated event details from the form
        $eventName = $_POST['EventName'];
        $description = $_POST['Description'];
        $startDate = $_POST['StartDate'];
        $endDate = $_POST['EndDate'];

        // Update the event details in the database
        $updateQuery = "UPDATE events SET EventName = ?, Description = ?, StartDate = ?, EndDate = ? WHERE EventID = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssssi", $eventName, $description, $startDate, $endDate, $eventID);

        if ($updateStmt->execute()) {
            echo "Event updated successfully!";
            // Redirect to event page (you can change the URL to your event page)
            header("Location: event.html");
            exit;
        } else {
            echo "Failed to update event.";
        }
    }
} else {
    echo "No event ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - MosqueCONNECT</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            margin-top: 50px;
            background: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ECB44A; /* Change to your theme color */
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: middle;
        }

        .btn {
            background-color: #ECB44A; /* Change to your theme color */
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #ECB44A; /* Change to your theme color */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Event</h2>
        <form action="" method="POST">
            <table class="table table-bordered">
                <tr>
                    <th>Event Name</th>
                    <td><input type="text" id="EventName" name="EventName" value="<?php echo isset($event['EventName']) ? $event['EventName'] : ''; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea id="Description" name="Description" class="form-control"><?php echo isset($event['Description']) ? $event['Description'] : ''; ?></textarea></td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td><input type="datetime-local" id="StartDate" name="StartDate" value="<?php echo isset($event['StartDate']) ? $event['StartDate'] : ''; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td><input type="datetime-local" id="EndDate" name="EndDate" value="<?php echo isset($event['EndDate']) ? $event['EndDate'] : ''; ?>" class="form-control"></td>
                </tr>
            </table>
            <div class="text-center mt-4">
                <input type="submit" name="update" value="Update Event" class="btn">
                <a href="event.html" class="btn">Back</a> <!-- Change to your event page URL -->
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
