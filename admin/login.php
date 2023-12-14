<?php
require_once('../php/connection.php');
require_once('php/authentication.php'); 

$auth = new UserAuthentication($conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--fontawesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="box">
      <form action="" method="post">
        <h1>Admin Login</h1>
        <div class="form-group">
          <label for="username">Username:</label>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username"  class="form-control"> 
            </div>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <div class="input-group">
            <input type="password" name="password" placeholder="Password" class="form-control" id="myInput" >
          </div>
        </div>
        <div class="errorMsg" id="errorBox">
          <p id="msg"></p>
          <a onclick="closeBox()"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="form-group">
          <button>Login</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    document.getElementById("msg").innerHTML = "Login Failed. Please check your username and password.";
    document.getElementById("errorBox").style.display = "none";
    function closeBox(){
      document.getElementById("errorBox").style.display = "none";
    }
  </script>
  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if($auth->login($username, $password)){
      header('Location: index.php');
    }else{
      echo'<script>';
      echo'document.getElementById("errorBox").style.display = "flex";';
      echo'document.getElementById("msg").innerHTML = "Invalid Credientials";';
      echo'</script>';
    }
  }
  ?>
</body>
</html>

<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #5e5f73;
    margin: 0;
  }

  .container {
    text-align: center;
    width: 400px; 
    background-color: #d4e3f4;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .box {
    max-width: 100%;
  }

  .form-group {
    margin-bottom: 20px; 
    text-align: left;
  }

  .input-group {
    margin-top: 15px; 
  }

  form input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box; 
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    width: 100%; 
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #2374a7; 
  }
  .errorMsg {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ff5050; 
    color: #fff; 
    padding: 10px;
    border-radius: 4px; 
    margin-bottom: 15px;
  }

  .errorMsg p {
    margin: 0;
  }

  .errorMsg a {
    color: #fff; 
    text-decoration: none;
    cursor: pointer;
  }

  .errorMsg a:hover {
    text-decoration: underline;
  }



</style>