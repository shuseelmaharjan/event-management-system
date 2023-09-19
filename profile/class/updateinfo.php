<?php

// Usage
include '../../php/connection.php';
include 'authentication.php';
$userAuth = new UserAuthentication($conn);

// Validate if the user is logged in
$userAuth->validateUserLogin();


if($userAuth->isUserLoggedIn()){
	$userInfo = $userAuth->getUserInfo();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    

    // Validate and sanitize POST data
    $name = isset($_POST["name"]) ? ($_POST["name"] == 'N/A' ? '' : $_POST["name"]) : '';
    $phone = isset($_POST["phone"]) ? ($_POST["phone"] == 'N/A' ? '' : $_POST["phone"]) : '';
    $dob = isset($_POST["dob"]) ? ($_POST["dob"] == 'N/A' ? '' : $_POST["dob"]) : '';
    $gender = isset($_POST["gender"]) ? ($_POST["gender"] == 'N/A' ? '' : $_POST["gender"]) : '';
    $fatherName = isset($_POST["fatherName"]) ? ($_POST["fatherName"] == 'N/A' ? '' : $_POST["fatherName"]) : '';
    $motherName = isset($_POST["motherName"]) ? ($_POST["motherName"] == 'N/A' ? '' : $_POST["motherName"]) : '';
    $tmpAddress = isset($_POST["tmpAddress"]) ? ($_POST["tmpAddress"] == 'N/A' ? '' : $_POST["tmpAddress"]) : '';
    $perAddress = isset($_POST["perAddress"]) ? ($_POST["perAddress"] == 'N/A' ? '' : $_POST["perAddress"]) : '';

    $query = "UPDATE tbl_users  SET
      name = '$name',
      phone= '$phone',
      dob='$dob',
      gender ='$gender',
      fatherName = '$fatherName',
      motherName = '$motherName',
      tmpAddress = '$tmpAddress',
      perAddress = '$perAddress'
      WHERE username = '$username'
    ";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo("Success");
    }else{
      echo("Failed");
    }
}
?>



<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <?php
var_dump($userInfo['username']);
        ?>
        <h1>Success</h1> 
        <p>Your KYC has been updated successfully.</p>
      </div>
    </div>
    </body>
</html>