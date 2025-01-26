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

$user_id = mysqli_real_escape_string($conn, $_GET['aid']);

// Fetch specific user data
$query = "SELECT * FROM user WHERE id = '$user_id'";
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




                <div class="profile-container">
                    <?php if (!empty($user['profile'])): ?>
                        <img src="assets/img/user.jpg" alt="Profile Picture" class="profile-image">
                    <?php endif; ?>

                    <div class="profile-item">
                        <span class="profile-label">Name:</span>
                        <?= htmlspecialchars($user['uname']) ?>
                    </div>

                    <div class="profile-item">
                        <span class="profile-label">Created Date:</span>
                        <?= htmlspecialchars($user['created_date']) ?>
                    </div>

                    <div class="profile-item">
                        <span class="profile-label">Mobile:</span>
                        <?= htmlspecialchars($user['mob']) ?>
                    </div>

                    <div class="profile-item">
                        <span class="profile-label">Email:</span>
                        <?= htmlspecialchars($user['email']) ?>
                    </div>

                    <div class="profile-item">
                        <span class="profile-label">Description:</span>
                        <?= htmlspecialchars($user['description']) ?>
                    </div>
                    <button class="add-details-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add More Details</button>
                </div>

                <!-- Modal Pop-up -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add More details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form action="lib/addmore.php" method="POST" autocomplete="off" class="form-container">
                                    <input type="hidden" name="access_key" value="f72ad2c1-d46d-4d27-b75a-0f1c8639132d">

                                    <div class="form-group">
                                        <label for="name">Investment Amount</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your username" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="intype">Investment Type</label>
                                        <select id="intype" name="intype" class="form-control" required>
                                            <option value="" disabled selected>Select Investment Type</option>
                                            <option value="Equity">Equity</option>
                                            <option value="Debt">Debt</option>
                                            <option value="Venture">Venture</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Online Amount</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Cash Amount</label>
                                        <input type="password" id="password" name="pass" class="form-control" placeholder="Enter your password" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="plan">Investment Plan</label>
                                        <select id="plan" name="plan" class="form-control" required>
                                            <option value="" disabled selected>Select Investment Plan</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="One-Time">One-Time</option>
                                        </select>
                                    </div>


                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>

                                </form>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal pup-up -->


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