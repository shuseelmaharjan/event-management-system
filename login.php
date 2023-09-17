
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Login</title>
    <link rel="stylesheet" href="css/log.css">
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
                <div class="input-box" id="logInput">
                    <span class="details">Email:</span>
                    <input type="text" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-box" id="logInput">
                    <span class="details">Password:</span>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="input-box" id="chkBox">
                <div class="left">
                    <input type="checkbox" onclick="showHide()"><span id="hideShow"></span>
                </div>
                <div class="right">
                    <span><a href="forgetpassword.php">Forgot Password?</a></span>
                </div>
                    
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
                <input type="submit" onclick="userVerify()" value="Login">
            </div>
        </form>
       
        <div class="back">
            <p>Don't have an account? <a href="register.php">Signup here.</a></p>
        </div>

</div>
<!--javascript code-->
<script>
         document.getElementById("danger").style.display = "none";
        document.getElementById("success").style.display = "none";
        
        document.getElementById("hideShow").innerText = "Show Password";

        //close footer alert btns
        function closeBtn(){
            document.getElementById("danger").style.display="none";
            document.getElementById("success").style.display= 'none';
        }

        //show and hide password
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
<!--php code-->
<?php

$login = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'php/connection.php';
    $email = $_POST["email"];
    $password =     $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from tbl_users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $username = $_SESSION['username'];
                echo"$username";
                

                echo '<script>';
                echo 'document.getElementById("success").style.display="inline-block";';
                echo'document.getElementById("successMsg").innerText = "Success";';
                echo '</script>';
                header('Location: index.php');
            } 
            else{
                echo '<script>';
                echo 'document.getElementById("danger").style.display="inline-block";';
                echo'document.getElementById("message").innerText = "Password doesnot match";';
                echo '</script>';
            }
        }
        
    } 
    else{
        echo '<script>';
        echo 'document.getElementById("danger").style.display="inline-block";';
        echo'document.getElementById("message").innerText = "Invalid Credientials";';
        echo '</script>';
    }
}
    
?>

<style>
   form .user-details{
    margin-top: 50px;
   }
   #danger,
   #success{
    margin-top: 20px;
   }
</style>
</body>
</html>