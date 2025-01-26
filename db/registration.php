<?php
include 'dbconfig.php';
// Check if form is submitted
if(isset($_POST['register'])) {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $description = mysqli_real_escape_string($conn, $_POST['desc']);
    $raw_password = $_POST['pass'];
    $created_date = date('Y-m-d H:i:s');
    
    // Basic validation
    if(empty($name) || empty($email) || empty($phone) || empty($raw_password)) {
        echo "<script>
            alert('Please fill all required fields!');
            window.location.href='../registration.php';
        </script>";
        exit();
    }

    // Password validation
    if(strlen($raw_password) < 6) {
        echo "<script>
            alert('Password must be at least 6 characters long!');
            window.location.href='../registration.php';
        </script>";
        exit();
    }

    // Encrypt password
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Email already exists!');
            window.location.href='../registration.php';
        </script>";
        exit();
    }

    // Insert data into database
    $sql = "INSERT INTO user (uname, email, mob, pass, description, created_date) 
            VALUES ('$name', '$email', '$phone', '$hashed_password', '$description', '$created_date')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Registration successful!');
            window.location.href='../login.php';
        </script>";
    } else {
        echo "<script>
            alert('Error: " . mysqli_error($conn) . "');
            window.location.href='../registration.php';
        </script>";
    }

    // Close connection
    mysqli_close($conn);
}
?>