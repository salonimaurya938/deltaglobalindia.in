<?php 
// At the top of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../db/dbconfig.php');

// Initialize response array
$response = array('status' => 'error', 'message' => 'Unknown error occurred');

// Log incoming data
error_log("Received POST data: " . print_r($_POST, true));

// Fetch POST data
$id = isset($_POST['id']) ? $_POST['id'] : '';
$image_to_delete = isset($_POST['image_to_delete']) ? $_POST['image_to_delete'] : '';

// Log the extracted data
error_log("ID: $id, Image to delete: $image_to_delete");

if (!empty($id) && !empty($image_to_delete)) {
    // Fetch the current `updated_id_proof` value
    $sql_fetch = "SELECT `updated_id_proof` FROM `booking` WHERE `id` = '$id'";
    $result = mysqli_query($db, $sql_fetch);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $updated_id_proof = $row['updated_id_proof'];

        // Convert the comma-separated string into an array
        $images = explode(',', $updated_id_proof);

        // Check if the image to delete exists in the list
        if (in_array($image_to_delete, $images)) {
            // Remove the image from the list
            $images = array_diff($images, array($image_to_delete));

            // Convert the array back into a comma-separated string
            $updated_id_proof = implode(',', $images);

            // Update the `updated_id_proof` field in the database
            $sql_update = "UPDATE `booking` SET `updated_id_proof` = '$updated_id_proof' WHERE `id` = '$id'";
            
            // Log the SQL query
            error_log("SQL query: $sql_update");

            $query = mysqli_query($db, $sql_update);

            if ($query) {
                // Send JSON response indicating success
                header('Content-Type: application/json');
                echo json_encode(array('status' => 'success', 'message' => 'Image deleted successfully!'));
            } else {
                // Send JSON response indicating failure
                header('Content-Type: application/json');
                echo json_encode(array('status' => 'error', 'message' => 'Failed to update the record!'));
            }
        } else {
            // Send JSON response indicating the image was not found
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error', 'message' => 'Image not found!'));
        }
    } else {
        // Send JSON response indicating the record was not found
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Record not found!'));
    }
} else {
    // Send JSON response indicating invalid input data
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error', 'message' => 'Invalid input data!'));
}
mysqli_close($db);
?>
