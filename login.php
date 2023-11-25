<?php
session_start(); // Start the session at the very beginning

require_once('php/connection.php'); // Include your database connection


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Login</title>
    <link rel="stylesheet" href="css/log.css">
    <style>
   form .user-details{
    margin-top: 50px;
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 20px;
   }
   #danger,
   #success{
    margin-top: 20px;
   }
   #chkBox{
    margin-top: 20px;
   }
</style>
</head>
<body>
<div class="logContainer">
        <div class="wrapper" id="logWrapper">
            <a href="index.php">
            <img src="images/logo.webp" width="130px" alt="logo">
            </a>
            <div class="title">Login</div>

        </div>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email:</span>
                    <input type="text" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-box">
                    <span class="details">Password:</span>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="input-box" id="chkBox">
                <div class="left">
                    <input type="checkbox" onclick="showHide()"><span id="hideShow"></span>
                </div>
                <!-- <div class="right">
                    <span><a href="forgetpassword.php">Forgot Password?</a></span>
                </div> -->
            </div>

            <div class="danger" id="danger">
                <p id="message"></p>
                <div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
            </div>
            <div class="success" id="success">
                <p id="successMsg"></p>
                <div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
            </div>
            
            <div class="button">
                <input type="submit" value="Login">
            </div>
        </form>
       
        <div class="back">
            <p>Don't have an account? <a href="register.php">Signup here.</a></p>
        </div>
</div>
<!-- JavaScript code (showHide and closeBtn functions) -->
<script>
    document.getElementById("danger").style.display = "none";
    document.getElementById("success").style.display = "none";
    document.getElementById("hideShow").innerText = "Show Password";

    function closeBtn(){
        document.getElementById("danger").style.display="none";
        document.getElementById("success").style.display= 'none';
    }

    function showHide(){
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("hideShow").innerText = "Hide Password";
        } else {
            x.type = "password";
            document.getElementById("hideShow").innerText = "Show Password";
        }
    }
</script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM tbl_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
            exit();
        } else {
            echo '<script>';
            echo 'document.getElementById("danger").style.display="inline-block";';
            echo 'document.getElementById("message").innerText = "Invalid Credentials";';
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'document.getElementById("danger").style.display="inline-block";';
        echo 'document.getElementById("message").innerText = "User not found";';
        echo '</script>';
    }
}?>
</body>
</html>

