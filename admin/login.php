<?php
include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container py-5">

        <!-- For demo purpose -->
        <div class="row mb-5">
          <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4">Admin Login</h1>
          </div>
        </div>
        <!-- End -->
      
      
        <div class="row">
          <div class="col-lg-5 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
              
                <div id="nav-tab-card" class="tab-pane fade show active">
                  <form role="form" action="php/validation.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="username">Username :</label> <br>
                      <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required class="form-control"> 
                      </div>
                    </div><br>

                    <div class="form-group">
                      <label for="password">Password :</label> <br>
                      <div class="input-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" id="myInput" required>
                        
                      </div>
                      <br>
                      <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction()">Show Password
                      
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-large btn-block btn-primary" name="login">Login</button>
                    </div>
                    <br>    
                    <div class="etc-login-form">
                        <p>Forgot your password? <a href="#">Click here</a></p>
                    </div>
                    <?php
                    function alert(){
                      echo '<script>
                      alert("Hello");
                      </script>';
                    }
                    ?>
                    <div id="invalid_msg" class="alert alert-danger">
                      Please enter valid credientials.
                    </div>
                </div>
                <!-- End -->
          </div>
        </div>
    </div>
    
    <script>
        document.getElementById('invalid_msg').style.display='none';
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })

            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                }
            
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>