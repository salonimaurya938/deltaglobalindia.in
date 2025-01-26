<?php
$id = $_GET['id'];
// echo $id;
include('../db/connect.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit;
}
// Use session data
$username = $_SESSION['admin-name'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];
$status = $_SESSION['status'];
$field_details = $_SESSION['field_details'];
$mob = $_SESSION['mob'];
$img = $_SESSION['img'];

// Ensure the correct role is being used
if ($role !== $_SESSION['role']) {
    header('location: login.php');
    exit;
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>The Taj Studios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>

   label[for=oldmail],label[for=newpass],label[for=confirm]
{
    font-size: 12px!important;
    color: red!important;
} 
</style>
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
                 <div class="page-header">
					<div class="row">
						<div class="col-lg-7 col-md-12 col-sm-12 col-12">
							<h5 class="text-uppercase">change password</h5>
						</div>
						<div class="col-lg-5 col-md-12 col-sm-12 col-12">
							<ul class="list-inline breadcrumb float-right">
								<li class="list-inline-item"><a href="#">Home</a></li>
								<li class="list-inline-item"> Change Password</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="content-page m-5 p-4">
					<div class="row">
                    <div class="col-md-6 offset-md-3">
							<form action="update_record.php" id="submit-form" method="post">
                                <div id="error" style="font-size: 18px;text-align: center;padding: 10px 0px;"></div>
                           <div class="form-group custom-mt-form-group">
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                                <!-- <label class="control-label"></label><i class="bar"></i> -->
                           </div>     

                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="oldmail" id="oldmail"/>
                                <label class="control-label">Old Password</label><i class="bar"></i>
                            </div>
                            
                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="newpass" id="newpass"/>
                                <label class="control-label">New Password</label><i class="bar"></i>
                            </div>
                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="confirm" id="confirm" />
                                <label class="control-label">Confirm Password</label><i class="bar"></i>
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" name="btn-save" id="btn-submit" type="submit">Reset Password</button>
                            </div>
                        </form>
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
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/validation-min.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#submit-form').validate({
      rules:
          {
            oldmail :{
                required: true,
                     },
            newpass :{
                required: true,
                minlength: 8,
                maxlength: 15
                     },
            confirm :{
               required: true,
               equalTo: '#newpass' 
                    }
          },
      messages :
          {
            oldmail : "Please Enter Username or Email",
            newpass :{
                required: "please provide a password",
                minlength: "password at least have 8 characters"
                   },
            cpassword:
                   {
                required: "please retype your password",
                equalTo: "password doesn't match !"
                    }
          },
      submitHandler: submitForm
    });
/* handle form submit */
function submitForm(){
var data = $("#submit-form").serialize();
$.ajax({
type : 'POST',
url : 'update_record.php',
data : data,
success: function(data){
   $("form").trigger("reset");
   $('#error').fadeIn().html(data);
   setTimeOut(function(){
      $('#error').fadeOut('slow');
   },2000);
}
});
}
return false;
  });
</script>
