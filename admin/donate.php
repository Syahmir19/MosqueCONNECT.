<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donations - MosqueCONNECT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
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
                        <a href="reserve.php" class="nav-item nav-link">Booking</a>
                        <a href="donate.php" class="nav-link nav-link active">Donate</a>
                        <a href="member.html" class="nav-link nav-link">Users</a>
                        <a href="admin.html" class="nav-link nav-link">Admin</a>
                    </div>
                    <a href="logout.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Logout</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Donations Record</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">All Donations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Donation Table Section Start -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h3 class="card-title mb-4 text-center">Donation Records</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Donation ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Amount (RM)</th>
                                    <th>Payment Method</th>
                                    <th>Bank</th>
                                    <th>Status</th>
                                    <th>Donation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Include database connection
                                include 'db_connection.php';

                                // Fetch all donation records from the database
                                $sql = "SELECT id, UserID, name, email, amount, method, bank, created_at FROM donations";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$row['id']}</td>
                                                <td>{$row['UserID']}</td>
                                                <td>{$row['name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['amount']}</td>
                                                <td>{$row['method']}</td>
                                                <td>{$row['bank']}</td>
                                                <td>Completed</td> <!-- Static Status -->
                                                <td>{$row['created_at']}</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>No donation records found.</td></tr>";
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donation Table Section End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 MosqueCONNECT. All rights reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
