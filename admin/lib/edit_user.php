<?php
include('../../db/dbconfig.php'); // Ensure you have the correct path to your database config

if (isset($_POST['update'])) {
    // Get the posted data
    $id = $_POST['id'];
    $uname = mysqli_real_escape_string($db, $_POST['uname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mob = mysqli_real_escape_string($db, $_POST['mob']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    
    // Handle file upload
    $target_dir = "../assets/img/";
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    
    // Start building the update query
    $set_fields = "uname='$uname', email='$email', mob='$mob'";

    // If a new image is uploaded, update the image path
    if (!empty($img)) {
        // Create a unique image name
        $img_extension = pathinfo($img, PATHINFO_EXTENSION);
        $unique_img_name = uniqid("img_", true) . '.' . $img_extension; // Generate unique name
        move_uploaded_file($img_tmp, $target_dir . $unique_img_name);
        $set_fields .= ", img='$unique_img_name'"; // Include the img field in the update
    } else {
        // If no new image, keep the existing one
        $result = mysqli_query($db, "SELECT img FROM wed_admin WHERE id='$id'");
        if ($row = mysqli_fetch_assoc($result)) {
            $existing_img = $row['img'];
            $set_fields .= ", img='$existing_img'"; // Retain existing image
        }
    }

    // Permissions
    $field_details = [
        'phone' => isset($_POST['phone']) ? 'on' : 'off',
        'checkin' => isset($_POST['checkin']) ? 'on' : 'off',
        'checkout' => isset($_POST['checkout']) ? 'on' : 'off',
        'flat' => isset($_POST['flat']) ? 'on' : 'off',
        'room' => isset($_POST['room']) ? 'on' : 'off',
        'totalpayment' => isset($_POST['totalpayment']) ? 'on' : 'off',
        'pending_payment' => isset($_POST['pending_payment']) ? 'on' : 'off',
        'paymentonline' => isset($_POST['paymentonline']) ? 'on' : 'off',
        'paymentoffline' => isset($_POST['paymentoffline']) ? 'on' : 'off',
        'paymentrecievedby' => isset($_POST['paymentrecievedby']) ? 'on' : 'off',
        'remark' => isset($_POST['remark']) ? 'on' : 'off',
        'perDayPayment' => isset($_POST['perDayPayment']) ? 'on' : 'off',
        'guest_rating' => isset($_POST['guest_rating']) ? 'on' : 'off',
    ];

    // Convert the permissions array to JSON
    $field_details_json = json_encode($field_details);
    $set_fields .= ", field_details='$field_details_json'"; // Add permissions to the update

    // Update query
    $sql = "UPDATE wed_admin SET $set_fields WHERE id='$id'";

    if (mysqli_query($db, $sql)) {
        echo "<script>alert('Permission Updated successfully!');</script>";
        echo "<script>window.location='../update_user.php?id=$id'</script>";
    } else {
        $_SESSION['error_message'] = "Error updating user: " . mysqli_error($db);
    }

    // Redirect back to the admin page (or any page you want)
    echo "<script>alert('Permission Updated successfully!');</script>";
    echo "<script>window.location='../update_user.php?id=$id'</script>"; // Adjust the redirect location as necessary
    exit();
}
?>
