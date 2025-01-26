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
// $id = $_GET['id'];
// echo $id;
$query="SELECT * FROM admin WHERE id='$id'";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
  

//edit and update query
   if(isset($_POST['update'])){
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    
 if($_FILES['pic']['name']==''){
    $unique_image=$result['img'];
      
  }
  else
  {
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_temp = $_FILES['pic']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $profile = "assets/img/".$unique_image;

    move_uploaded_file($file_temp, $profile);
}   
    
   $update_query = "UPDATE wed_admin SET uname='$uname',email='$email', img='$unique_image' WHERE id='$id'";
  //  echo $update_query;
  //  die();
if ($conn->query($update_query)) {
  header("Location: admin-profile.php?id=$id");
}else{
  echo "<script type= 'text/javascript'>alert('Data Not Successfully Updated. Please Try Again!!);</script>";
}
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
  <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
              <h5 class="text-uppercase">Edit Profile</h5>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
              <ul class="list-inline breadcrumb float-right">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="admin-profile.php">Admin Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <div class="page-title">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="page-title">Edit Admin Profile</div>
                    </div>
                    
                  </div>
                </div>
                <div class="card-body"> 
                  <div class="row">
                    <div class="col-md-6">
                       <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                      <div class="col-md-12">
                       <div class="form-group custom-mt-form-group">
                       <input type="text" name="uname" required="required" value="<?php echo $result['uname'];?>" />
                        <label class="control-label w-100">User Name*</label><i class="bar"></i>
                         </div>
                          <div class="form-group custom-mt-form-group">
                        <input type="email" name="email"  required="required" value="<?php echo $result['email'];?>"/>
                          <label class="control-label w-100">E-mail*</label><i class="bar"></i>
                          </div>
                          </div>
                         <div class="col-md-12"> <img src="assets/img/<?php echo $result['img'];?>" style="width:200px;"></div>
            <div class="col-md-12">
                <div class="form-group custom-mt-form-group">
                    <input type="file" name="pic"  style="margin-bottom:10px;">
                     <label class="control-label">Profile Picture</label><i class="bar"></i>
                </div>
            </div>
                         <div class="col-md-6 text-center">
                         <button class="btn btn-primary mr-2" type="submit" name="update">Update</button>
                                                
                          <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
