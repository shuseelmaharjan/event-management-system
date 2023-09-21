<?php
session_start();
include('../../php/connection.php');

if (isset($_POST['login'])) {

	

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if (empty($username)) {
		header("Location: ../login.php?error=Username is required");
	    exit();
	}else if(empty($password)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

		$result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)  
            {  
                $_SESSION['username'] = $username;  
                echo'<script>alert("Success")</script>';
                header('location: ../../admin/index.php');
            }
            else{
                header("Location: ../login.php?error=Incorrect username or password");
		        exit();
            }
	}
	
}else{
	header("Location: ../login.php");
	exit();
}

        ?>