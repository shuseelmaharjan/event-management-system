<?php
session_start();

if(isset($_POST['login'])){
    // username and password sent from form
    require_once('../../php/connection.php');
   


    $username = mysqli_real_escape_string($conn, $_POST["username"]);  
    $password = mysqli_real_escape_string($conn, $_POST["password"]);  
    $password = md5($password);  
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($conn, $query);  
    if(mysqli_num_rows($result) > 0)  
    {  
         $_SESSION['username'] = $username;  
         echo'<script>alert("Success")</script>';
         header('location: ../../admin/index.php');
    }  
    else  
    {  
        echo('failed');
         
    } 
  
    }

        ?>