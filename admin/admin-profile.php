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
<html>
<style type="text/css">
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Tht Taj Studios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
         <!-- sidebar start -->
       <?php include('include/sidebar.php');?>
       <!-- sidebar end -->
        <div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
				  <div class="page-header">
					<div class="row">
						<div class="col-lg-7 col-md-12 col-sm-12 col-12">
							<h5 class="text-uppercase">Admin Profile</h5>
						</div>
						<div class="col-lg-5 col-md-12 col-sm-12 col-12">
							<ul class="list-inline breadcrumb float-right">
								<li class="list-inline-item"><a href="index.php">Home</a></li>
								<li class="list-inline-item">Admin Profile</li>
							</ul>
						</div>
					</div>
				</div>
                <div class="card-box m-b-0">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = $_GET['id'];
                                    // echo $id;
                                    $query="SELECT * FROM admin WHERE id='$id'";
                                    $stmt=$conn->prepare($query);
                                    $stmt->execute();
                                    $result = $stmt->fetch();
                                        ?>
                                        <tr>
                                        <td><?php echo $result['id'];?></td>
                                        <td><?php echo $result['uname'];?></td>
                                        <td><?php echo $result['email'];?></td>
                                        <td>
                                            <a href="edit-admin-profile.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm mb-1">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <!-- notification box start -->
       
 <!-- notification box end -->
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
<!-- for password eye -->
<script>
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
