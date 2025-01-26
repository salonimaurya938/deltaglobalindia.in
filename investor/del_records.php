<?php
include('../db/connect.php');

session_start();

if (isset($_POST['delete_booking_record'])) {
    $delete_id = $_POST['delete_id'];
    $entered_password = $_POST['admin_password'];
    $admin_username = $_SESSION['log-admin']; 

    // Fetch the admin password from the database
    $admin_query = "SELECT pass FROM wed_admin WHERE uname = :uname OR email = :email";
    $admin_stmt = $conn->prepare($admin_query);
    $admin_stmt->bindParam(':uname', $admin_username);
    $admin_stmt->bindParam(':email', $admin_username);
    $admin_stmt->execute();
    $admin_data = $admin_stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin_data) {
        $stored_password = $admin_data['pass'];

        // Verify the entered password
        if (base64_encode($entered_password) === $stored_password) {
            // Password is correct, proceed with deletion
            $delete_query = "DELETE FROM booking WHERE id = :id";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
            $delete_result = $delete_stmt->execute();

            if ($delete_result) {
                $_SESSION['success_message'] = "Record deleted successfully";
            } else {
                $_SESSION['error_message'] = "Error deleting record";
            }
        } else {
            // Password is incorrect
            $_SESSION['error_message'] = "Incorrect password.";
        }
    } else {
        $_SESSION['error_message'] = "Error fetching admin password";
    }

    header("Location: investor.php");
    exit();
}
?>
