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
// Fetch all user data
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
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
    <!-- Include Font Awesome (add this in your HTML head) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style type="text/css">
        .active_home {
            background: #01c0c8;
        }

        .active_home a {
            color: white !important;
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

                <div class="table-responsive table table-striped">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id']) ?></td>
                                    <td><?= htmlspecialchars($row['uname']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['mob']) ?></td>
                                    <td><?= htmlspecialchars($row['created_date']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <!-- Updated Buttons -->
                                            <button onclick="window.location.href='details.php?aid=<?= $row['id'] ?>'" style="background: none; border: none; cursor: pointer;">
                                            <i class="fa fa-eye" style="color: blue;"></i>
                                            </button>

                                            <button  onclick="window.location.href='update.php?id=<?= $row['id'] ?>'" style="background: none; border: none; cursor: pointer;">
                                                <i class="fa fa-pencil" style="color: green;"></i>
                                            </button>

                                            <button  onclick="window.location.href='lib/details.php?id=<?= $row['id'] ?>'" style="background: none; border: none; cursor: pointer;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>