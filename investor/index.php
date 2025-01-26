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
    <style type="text/css">
        .active_home {
            background: #01c0c8;
        }

        .active_home a {
            color: white !important;
        }

           /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      color: #333;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    h1, h2, h3, h4, p {
      margin: 0;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(120deg, #007bff, #01c0c8);
      color: #fff;
      text-align: center;
      padding: 40px 20px;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    .hero .btn {
      padding: 10px 20px;
      border: none;
      background-color: #fff;
      color: #01c0c8;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      margin: 5px;
    }

    .hero .btn:hover {
      background-color: #e0e0e0;
    }

    /* Dashboard Summary */
    .summary {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin: 30px 0;
    }

    .summary-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .summary-card h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #01c0c8;
    }

    .summary-card p {
      font-size: 1rem;
      color: #666;
    }

    /* Featured Opportunities */
    .opportunities {
      margin: 30px 0;
    }

    .opportunities h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .opportunities-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .opportunity-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .opportunity-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .opportunity-card-content {
      padding: 15px;
    }

    .opportunity-card-content h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .opportunity-card-content p {
      color: #666;
      font-size: 0.9rem;
      margin-bottom: 10px;
    }

    .opportunity-card-content .btn {
      padding: 8px 15px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 0.9rem;
      cursor: pointer;
    }

    .opportunity-card-content .btn:hover {
      background-color: #0056b3;
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
        <div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
                <!-- <h3 style="text-align:center;">Welcome To <?php echo $username . ' ' . $role; ?></h3> -->

                <!-- Hero Section -->
                <section class="hero">
                    <h1>Welcome to Your <?php echo $username; ?> Dashboard</h1>
                    <p>Track your investments and discover new opportunities.</p>
                    <button class="btn">Invest Now</button>
                    <button class="btn">Learn More</button>
                </section>

                <!-- Dashboard Summary -->
                <div class="container">
                    <section class="summary">
                        <div class="summary-card">
                            <h3>$10,500</h3>
                            <p>Your Investments</p>
                        </div>
                        <div class="summary-card">
                            <h3>8</h3>
                            <p>Active Projects</p>
                        </div>
                        <div class="summary-card">
                            <h3>12.5%</h3>
                            <p>ROI</p>
                        </div>
                        <div class="summary-card">
                            <h3>Clean Energy</h3>
                            <p>Trending Sector</p>
                        </div>
                    </section>
                </div>

                <!-- Featured Opportunities -->
                <div class="container">
                    <section class="opportunities">
                        <h2>Featured Opportunities</h2>
                        <div class="opportunities-list">
                            <div class="opportunity-card">
                                <img src="https://via.placeholder.com/300x150" alt="Opportunity">
                                <div class="opportunity-card-content">
                                    <h3>Green Energy Project</h3>
                                    <p>Invest in the future of clean energy.</p>
                                    <button class="btn">Learn More</button>
                                </div>
                            </div>
                            <div class="opportunity-card">
                                <img src="https://via.placeholder.com/300x150" alt="Opportunity">
                                <div class="opportunity-card-content">
                                    <h3>AI Startup</h3>
                                    <p>Support innovation in artificial intelligence.</p>
                                    <button class="btn">Learn More</button>
                                </div>
                            </div>
                            <div class="opportunity-card">
                                <img src="https://via.placeholder.com/300x150" alt="Opportunity">
                                <div class="opportunity-card-content">
                                    <h3>Healthcare Revolution</h3>
                                    <p>Shape the future of medical technology.</p>
                                    <button class="btn">Learn More</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>



                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <span> <a href="all_booking.php">Total Investor</a></span>

                                <?php
                                include '../db/dbconfig.php';
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                // Perform the query
                                $querys = "SELECT * FROM user where id='$id'";
                                $result = $conn->query($querys);

                                // Get the number of rows returned
                                $nums_course = $result->num_rows;
                                ?>

                                <p style="font-size: 20px;font-weight: bold;"><?php echo $nums_course; ?></p>
                            </div>
                        </div>
                    </div>

                </div> -->


            </div>
        </div>
        <div class="sidebar-overlay" data-reff=""></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/popper.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="assets/js/select2.min.js"></script>
        <script type="text/javascript" src="assets/js/moment.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="assets/plugins/raphael/raphael-min.js"></script>
        <script type="text/javascript" src="assets/js/fullcalendar.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.fullcalendar.js"></script>
        <script type="text/javascript" src="assets/js/chart.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>

</body>

</html>