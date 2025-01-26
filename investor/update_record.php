<?php include('../db/connect.php'); ?>
<!-- change password or forgot password update code for admin-->
<?php
if(isset($_POST['btn-save'])){
	$id=$_POST['id'];
	// $new_pass= $_POST['newpass'];
	// $confirm_pass=$_POST['confirm'];
	$old_pass=base64_encode($_POST['oldmail']);
	$new_pass=base64_encode($_POST['newpass']);
	$query1="SELECT * from wed_admin  where id='$id'";
	$smtp2=$conn->prepare($query1);
	$smtp2->execute();
	$result=$smtp2->fetch();
	if($old_pass == $result['pass']){
    $update_query="UPDATE wed_admin set pass='$new_pass' where id='$id'";
    $smtp1=$conn->prepare($update_query);
	$smtp1->execute();
	$count=$smtp1->rowCount();
      if($count=='0'){
      	echo "<p style='color:red;'>Somthing is wrong please try again!</p>";
      }else{
      	echo "<p style='color:green;'>Your Password Successfully Changed!</p>";
      }
	}else{
		echo "<p style='color:red;'>Your Old Password not match Please try again!</p>";
	}
}

// update label
if(isset($_POST['update_rooms'])){
   $update_room=$_POST['update_room'];
   $update_full=$_POST['update_full'];
   $update_pending=$_POST['update_pending'];
   $del_id=$_POST['update_id'];
   $query="UPDATE booking set room='$update_room', full_payment='$update_full', pending_payment='$update_pending' where id='$del_id'";
if ($conn->query($query)) {
   echo "<script>window.location='booking.php'</script>";
}else{
  echo "<script>alert('Data Not Successfully Updated. Please Try Again!!);</script>";
}
  }

?>