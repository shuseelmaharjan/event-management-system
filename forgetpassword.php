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
            <div class="title" >Forget Password</div>

        </div>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box" id="logInput">
                    <span class="details">Enter your email address:</span>
                    <input type="text" name="emailOruser" placeholder="Enter your email address" required>
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
                <input type="submit" onclick="userVerify()" value="Submit">
            </div>
        </form>
       
        <div class="back">
            <p>Back to login page? <a href="login.php">Click here.</a></p>
        </div>

</div>
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
<style>
   form .user-details{
    margin-top: 50px;
   }
</style>
</body>
</html>