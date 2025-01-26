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
      
    </div>
</body>
</html>