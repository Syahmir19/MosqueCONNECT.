<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Bookings - MosqueCONNECT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .history-container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 100px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .table th, .table td {
            color: black; /* Change text color to black */
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-3">
                <a href="home.html" class="navbar-brand">
                    <h1 class="mb-0">Mosque<span class="text-primary">CONNECT</span></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav ms-lg-auto mx-xl-auto">
                        <a href="home.html" class="nav-item nav-link">Home</a>
                        <a href="prayertimes.html" class="nav-item nav-link">Prayer Times</a>
                        <a href="event.html" class="nav-item nav-link">Events</a>
                        <a href="reserve.php" class="nav-item nav-link active">Booking</a>
                        <a href="donate.php" class="nav-link nav-link">Donate</a>
						<a href="member.html" class="nav-link nav-link">Users</a>
                        <a href="admin.html" class="nav-link nav-link">Admin</a>
                    </div>
                    <a href="logout.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Logout</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">All User Bookings</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">All Bookings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- History Container Start -->
    <div class="history-container">
        <h2 class="text-center mb-4">All Facility Bookings</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>User ID</th>
                    <th>Facility Name</th>
                    <th>Start Date & Time</th>
                    <th>End Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include 'db_connection.php';

                // Fetch all reservation history from the database
                $sql = "SELECT r.ReservationID, r.UserID, f.FacilityName, r.StartDateTime, r.EndDateTime, r.Status 
                        FROM reservations r 
                        JOIN facilities f ON r.FacilityID = f.FacilityID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['ReservationID']}</td>
                                <td>{$row['UserID']}</td>
                                <td>{$row['FacilityName']}</td>
                                <td>{$row['StartDateTime']}</td>
                                <td>{$row['EndDateTime']}</td>
                                <td>{$row['Status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No reservations found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2 class="text-center mt-4">All Event Bookings</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Event Name</th>
                    <th>Booking Date & Time</th>
                    <th>Participants</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all event booking history from the database
                $sql_events = "SELECT eb.BookingID, eb.UserID, e.EventName, eb.BookingDateTime, eb.Participants 
                               FROM event_bookings eb 
                               JOIN events e ON eb.EventID = e.EventID";
                $result_events = $conn->query($sql_events);

                if ($result_events->num_rows > 0) {
                    while ($row = $result_events->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['BookingID']}</td>
                                <td>{$row['UserID']}</td>
                                <td>{$row['EventName']}</td>
                                <td>{$row['BookingDateTime']}</td>
                                <td>{$row['Participants']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No event bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- History Container End -->

    <!-- Footer Start -->
    <div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-4 footer-inner">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Mosque<span class="text-primary">CONNECT</span></h4>
                        <p class="mb-4 text-secondary">MosqueCONNECT is a digital platform that provides real-time prayer times, event scheduling, facility reservations, and donation tracking for mosques.</p>
                        <a href="donate.html" class="btn btn-primary py-2 px-4">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Our Mosque</h4>
                        <div class="d-flex flex-column">
                            <h6 class="text-secondary mb-0">Our Address</h6>
                            <div class="d-flex align-items-center border-bottom py-4">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="fa fa-map-marker-alt text-dark"></i></span>
                                <a href="" class="text-body">Jalan Molek 3/19,Taman Molek, Johor Bahru, Johor.</a>
                            </div>
                            <h6 class="text-secondary mt-4 mb-0">Our Mobile</h6>
                            <div class="d-flex align-items-center py-4">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i class="fa fa-phone-alt text-dark"></i></span>
                                <a href="" class="text-body">+011 3922 0216</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Follow Us</h4>
                        <div class="d-flex flex-column">
                            <a class="text-body mb-2" href=""><i class="fab fa-facebook-f me-3"></i>Facebook</a>
                            <a class="text-body mb-2" href=""><i class="fab fa-twitter me-3"></i>Twitter</a>
                            <a class="text-body mb-2" href=""><i class="fab fa-instagram me-3"></i>Instagram</a>
                            <a class="text-body" href=""><i class="fab fa-linkedin me-3"></i>LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
