<?php

// Usage
include '../../php/connection.php'; // Include your database connection file
include 'authentication.php';
$userAuth = new UserAuthentication($conn);

// Validate if the user is logged in
$userAuth->validateUserLogin();


if($userAuth->isUserLoggedIn()){
	$userInfo = $userAuth->getUserInfo();
}


$id = $userInfo['id'];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$fatherName = $_POST["fatherName"];
$motherName = $_POST["motherName"];
$tmpAddress = $_POST["tmpAddress"];
$perAddress = $_POST["perAddress"];


// Prepare the SQL statement using a prepared statement
$sql = "UPDATE tbl_users SET 
    name = ?,
    email = ?,
    phone = ?,
    dob = ?,
    gender = ?,
    fatherName = ?,
    motherName = ?,
    tmpAddress = ?,
    perAddress = ?
    WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssssi", $name, $email, $phone, $dob, $gender, $fatherName, $motherName, $tmpAddress, $perAddress, $id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('refresh:2; url=http://localhost/eveproject/profile/manage.php');
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Prepared statement failed.";
}

// Close the database connection at the end, if necessary
mysqli_close($conn);

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
        <h1>Success</h1> 
        <p>Your KYC has been updated successfully.</p>
      </div>
    </div>
    </body>
</html>