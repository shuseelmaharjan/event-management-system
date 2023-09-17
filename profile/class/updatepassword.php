<?php
// Include the UserAuthentication class
include '../../php/connection.php'; // Include your database connection file
require_once 'authentication.php';


// Create an instance of the UserAuthentication class
$userAuth = new UserAuthentication($conn);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get form input data
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Call the changePassword method and get the result
    $changePasswordResult = $userAuth->changePassword($currentPassword, $newPassword, $confirmPassword);

    // Display the result
    echo $changePasswordResult;
}
?>
