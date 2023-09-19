<?php

// Usage
include '../php/connection.php'; // Include your database connection file
include 'class/authentication.php';
$userAuth = new UserAuthentication($conn);

// Validate if the user is logged in
$userAuth->validateUserLogin();
if($userAuth->isUserLoggedIn()){
	$userInfo = $userAuth->getUserInfo();
}
?>