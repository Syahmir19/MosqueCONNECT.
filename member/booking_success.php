<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Booking Success - MosqueCONNECT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .success-container {
            max-width: 600px;
            margin: auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 100px;
        }

        .btn-back {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="success-container">
        <h2 class="text-center mb-4">Booking Successful!</h2>
        <p class="text-center">
            <?php
            session_start();
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']); // Clear the message after displaying
            } else {
                echo "No booking information available.";
            }
            ?>
        </p>
        <div class="text-center">
            <a href="home.php" class="btn-back">Go to Home</a>
            <a href="historybooking.php" class="btn-back">View Booking History</a>
        </div>
    </div>
</body>

</html>
