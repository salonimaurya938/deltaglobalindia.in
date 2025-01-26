<?php
// Connect to the database
// $conn = mysqli_connect('localhost', 'root', '', 'id_upload');
// if (!$conn) {
//     die('Error Occurred: ' . mysqli_connect_error());
// }

include 'db/dbconfig.php';

session_start();
// if (!empty($_SESSION['log-admin'])) {
//     header('location:login.php');
// }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>The Delta Golbal</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <form action=" " method="POST">
                            <div class="text-center">
                                <h3><B>Delta Golbal User Login</B></h3>
                            </div>

                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="uname" required="required" />
                                <label class="control-label">Username or Email</label><i class="bar"></i>
                            </div>
                            <div class="form-group custom-mt-form-group">
                                <input type="password" name="upass" required="required" />
                                <label class="control-label">Password</label><i class="bar"></i>
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" type="submit" name="login">Login</button>
                            </div>
                            <p class="small mt-2" style="font-size: 15px;">
                                Don’t have an account?
                                <a href="register.php" class="text-primary">Register here</a>.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="admin/assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="admin/assets/js/app.js"></script>
</body>

</html>

<?php
// Include the database connection file
include 'db/dbconfig.php';

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Get the form data
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    // Encode the password (Note: Base64 encoding is not secure for storing passwords)
    $base_pass = base64_encode($upass);

    // Prepare and execute the query to check the user
    $query = "SELECT * FROM user WHERE (uname = '$uname' OR email = '$uname') AND pass = '$base_pass'";
    // echo  $query;
    // die();
    // Execute the query
    $result = $conn->query($query);

    // Check if a user was found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if there's already a session for a different user role
        if (isset($_SESSION['role']) && $_SESSION['role'] !== $row['role']) {
            echo "<script>alert('Another user is already logged in. Please log out first.');</script>";
            echo "<script>window.location='login.php'</script>";
            exit;
        }
        // Store session data
        $_SESSION['log-admin'] = $uname;
        $_SESSION['admin-name'] = $row['uname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['id'];

        // Redirect to dashboard
        echo "<script>window.location='investor/index.php'</script>";
    } else {
        // If no user was found or credentials do not match
        echo "<script>alert('Username or Password did not match. Please try again.');</script>";
        echo "<script>window.location='login.php'</script>";
    }

    // Close the database connection
    $conn->close();
}
?>