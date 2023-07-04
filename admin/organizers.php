<?php
include('../php/connection.php');
// Start session
session_start();

// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}

include('header.php');
include('sidebar.php');

?>
<!--start of container-->
<div class="main-container">
    <div class="main-title">
        <p class="font-weight-bold">Organizers</p>
    </div>
</div>