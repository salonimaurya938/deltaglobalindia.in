<?php
include('../db/connect.php');

session_start();
if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit;
}
// Use session datag
$username = $_SESSION['admin-name'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];

// Ensure the correct role is being used
if ($role !== $_SESSION['role']) {
    header('location: login.php');
    exit;
}

include '../db/dbconfig.php';

// Fetch specific user data
$query = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User not found");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>The Taj Studios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">
        .active_home {
            background: #01c0c8;
        }

        .active_home a {
            color: white !important;
        }

        /* <style>body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        } */

        .profile-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .profile-item {
            margin-bottom: 15px;
        }

        .profile-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .add-details-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .profile-image {
            max-width: 200px;
            border-radius: 50%;
        }

        :root {
            --primary-color: #01c0c8;
            --secondary-color: #4CAF50;
            --text-color: #333;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            color: var(--text-color);
        }

        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 1rem;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 2rem;
            border: 4px solid var(--primary-color);
        }

        .profile-details {
            flex-grow: 1;
        }

        .profile-item {
            margin-bottom: 1rem;
            display: flex;
        }

        .profile-label {
            font-weight: bold;
            width: 150px;
            color: var(--primary-color);
        }

        .investment-section {
            margin-top: 2rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1.5rem;
        }

        .table {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-image {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .profile-item {
                flex-direction: column;
            }

            .profile-label {
                margin-bottom: 0.5rem;
                width: auto;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- header start -->
        <?php include('include/header.php'); ?>
        <!-- header end -->
        <!--slider start -->
        <?php include('include/sidebar.php'); ?>
        <!--slider End -->

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <h5 class="text-uppercase">Investor details</h5>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <ul class="list-inline breadcrumb float-right">
                                <li class="list-inline-item"><a href="index.php">Home</a></li>
                                <li class="list-inline-item">Investor Portal</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <!-- Optional: Include header and sidebar if needed -->

                    <div class="profile-container">
                        <div class="profile-header">
                            <?php if (!empty($user['profile'])): ?>
                                <img src="assets/img/user.jpg" alt="Profile Picture" class="profile-image">
                            <?php else: ?>
                                <img src="assets/img/user.jpg" alt="Default Profile" class="profile-image">
                            <?php endif; ?>

                            <div class="profile-details">
                                <h2><?= htmlspecialchars($user['uname']) ?></h2>
                                <div class="profile-item">
                                    <span class="profile-label">Created Date:</span>
                                    <?= htmlspecialchars($user['created_date']) ?>
                                </div>
                                <div class="profile-item">
                                    <span class="profile-label">Email:</span>
                                    <?= htmlspecialchars($user['email']) ?>
                                </div>
                                <div class="profile-item">
                                    <span class="profile-label">Mobile:</span>
                                    <?= htmlspecialchars($user['mob']) ?>
                                </div>
                            </div>
                        </div>

                        <div class="profile-item">
                            <span class="profile-label">Description:</span>
                            <?= htmlspecialchars($user['description'] ?? 'No description available') ?>
                        </div>

                        <div class="investment-section">
                            <h3 class="mb-4">Investment Details</h3>
                            <?php if (!empty($investments)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Investment Name</th>
                                                <th>Type</th>
                                                <th>Online Amount</th>
                                                <th>Cash Amount</th>
                                                <th>Plan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($investments as $investment): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($investment['name']) ?></td>
                                                    <td><?= htmlspecialchars($investment['intype']) ?></td>
                                                    <td>₹<?= htmlspecialchars($investment['online_amount']) ?></td>
                                                    <td>₹<?= htmlspecialchars($investment['cash_amount']) ?></td>
                                                    <td><?= htmlspecialchars($investment['plan']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-center text-muted">No investments found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <script>
                    function addMoreDetails() {
                        // Placeholder function for adding more details
                        alert('Add More Details functionality to be implemented');
                    }
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>

</div>
</body>

</html>