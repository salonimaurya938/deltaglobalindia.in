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
     .active_home{
        background:#01c0c8;
     }
     .active_home a{
        color: white!important;
     }
 </style>
</head>
<body>
    <div class="main-wrapper">
        <!-- header start -->
       <?php include('include/header.php');?>
       <!-- header end -->
        <!--slider start -->
       <?php  include('include/sidebar.php');?>
      <!--slider End -->
        <div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
            <h3 style="text-align:center;">Welcome To <?php echo $username.' '. $role; ?></h3>
               <div class="row">
         <div class="col-md-3">
             <div class="dash-widget dash-widget5">
             <span class="dash-widget-icon bg-primary"><i class="fa fa-users" aria-hidden="true"></i></span>
                <div class="dash-widget-info">
                <span>  <a href="all_booking.php">Total Investor</a></span>

           <?php
           include '../db/dbconfig.php';
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            // Perform the query
            $querys = "SELECT * FROM user";
            $result = $conn->query($querys);
            
            // Get the number of rows returned
            $nums_course = $result->num_rows;
           ?>

            <p style="font-size: 20px;font-weight: bold;"><?php echo $nums_course;?></p>
                            </div>
                        </div>
                    </div>

                </div>
		
         
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