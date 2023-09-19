<?php
// Include the UserAuthentication class
include '../../php/connection.php'; // Include your database connection file
require_once 'authentication.php';

// Create an instance of the UserAuthentication class
$userAuth = new UserAuthentication($conn);
// Validate if the user is logged in
$userAuth->validateUserLogin();
if($userAuth->isUserLoggedIn()){
	$userInfo = $userAuth->getUserInfo();
}

if (isset($_POST["submit"])) {
    // Assuming you have a variable containing the unique identifier for the user or record to update
    $user_id = $userInfo["id"]; // Change this to the actual user ID or identifier
    
    $target_dir = "uploads/";
    $original_file_name = basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

    // Generate a unique filename
    $unique_filename = generateUniqueFileName($imageFileType);

    $target_file = $target_dir . $unique_filename;
    $uploadOk = 1;

    // Check if image file is a valid image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_image_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_image_types)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Update the image path in the database for the specified user or record
            $imagePath = $target_file;
            $updateQuery = "UPDATE tbl_users SET image = ? WHERE id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("si", $imagePath, $user_id); // 'i' for integer, assuming id is an integer

            if ($stmt->execute()) {
                echo "The file " . $original_file_name . " has been uploaded with a unique name: " . $unique_filename . " and updated in the database.";
            } else {
                echo "Error updating data in the database.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Function to generate a unique filename
function generateUniqueFileName($extension) {
    $timestamp = time();
    $random_string = bin2hex(random_bytes(6));
    return $timestamp . "_" . $random_string . "." . $extension;
}
?>