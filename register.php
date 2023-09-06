<?php
session_start();
require_once('vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Register</title>
    <!--fontawesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <a href="index.php">
            <img src="images/logo.webp" width="130px" alt="logo">
            </a>
            <div class="title">Registration</div>

        </div>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name:</span>
                    <input type="text" name="name" placeholder="Your Full Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Your Email:</span>
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone:</span>
                    <input type="number" name="phone" placeholder="Your phone number" required>
                </div>
                <div class="input-box">
                    <span id="msgUsername"></span>
                    <span class="details">Username:</span>
                    <input type="text" name="username" placeholder="Username" id="username" oninput="checkUsername()" required>
                </div>
                <div class="input-box">
                    <span class="details">Date of Birth:</span>
                    <input type="date" name="dob" placeholder="" required>
                </div>
                <div class="input-box">
                    <span class="details">Gender:</span>
                    <div id="genders">
                        <input type="radio" value="male" name="gender" required>Male
                        <input type="radio" value="female" name="gender">Female
                        <input type="radio" value="other" name="gender">Other
                    </div>
                    
                </div>
                
                <div class="input-box">
                    <span class="details">Password:</span>
                    <input type="password" placeholder="New Password" name="password" id="newPassword"  onkeyup="validatePassword()" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password:</span>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirmPassword" onkeyup="validatePasswords()" required>
                </div>
                
                <div class="input-box" id="chkBox">
                    <input type="checkbox" onclick="showHide()"><span id="hideShow"></span>
                </div>

                <div class="danger" id="danger">
                    <p id="message"></p>
                    <div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
                </div>
                <div class="success" id="success">
                    <p id="successMsg"></p>
                    <div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
                </div>

            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
        

        <div class="back">
            <p>Already a member? <a href="login.php">Login here</a></p>
        </div>
       
    </div>
    <script type="text/javascript">

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
            var x = document.getElementById("newPassword");
            var y = document.getElementById("confirmPassword");
            if (x.type && y.type === "password") {
                x.type = "text";
                y.type = "text";
                document.getElementById("hideShow").innerText = "Hide Password";
            } else {
                x.type = "password";
                y.type = "password";
                document.getElementById("hideShow").innerText = "Show Password";

            }
        }
        
    </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];

        // Database connection 
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "eventmgmt";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if the username already exists in the database
            $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<script>';
                echo 'document.getElementById("danger").style.display="inline-block";';
                echo'document.getElementById("message").innerText = "Username already exist on database, please use different one.";';
                echo '</script>';

            } else {
                // Check if passwords match
                if ($password !== $confirmPassword) {
                    echo '<script>';
                    echo 'document.getElementById("danger").style.display="inline-block";';
                    echo'document.getElementById("message").innerText = "Password doesnot match";';
                    echo '</script>';
                } else {
                    // Hash the password (use a suitable password hashing library)
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insert data into the database
                    $insertStmt = $conn->prepare("INSERT INTO tbl_users (name, email, phone, username, dob, gender, password) VALUES (:name, :email, :phone, :username, :dob, :gender, :password)");
                    $insertStmt->bindParam(':name', $name);
                    $insertStmt->bindParam(':email', $email);
                    $insertStmt->bindParam(':phone', $phone);
                    $insertStmt->bindParam(':username', $username);
                    $insertStmt->bindParam(':dob', $dob);
                    $insertStmt->bindParam(':gender', $gender);
                    $insertStmt->bindParam(':password', $hashedPassword);
                    $insertStmt->execute();

                    echo '<script>';
                    echo 'document.getElementById("success").style.display="inline-block";';
                    echo'document.getElementById("successMsg").innerText = "Account Created Successfully.";';
                    echo '</script>';
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }
?>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300&family=Poppins&family=Roboto:ital@1&family=Ubuntu:wght@400;500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins' sans-serif;
}
body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.container{
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
}
.container .wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
}
.container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
}
.wrapper img,
.wrapper .title{
    margin: 0px 10px;
}
.container .title::before{
    content: '';
    height: 3px;
    left: -40px;
    bottom: -15px;
    width: 60px;
    align-items: center;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    position: absolute;
}
.container form .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}
form .user-details .input-box{
    margin-bottom: 15px;
    margin: 20px 0 12px 0;
    width: calc(100% / 2 - 20px);
}
.user-details .input-box .details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
    font-family: 'Poppins' sans-serif;
    font-size: 18px;
}
#genders{
    display: flex;
    margin-top: 20px;
    position: absolute;
}
#genders input{
    height: 15px;
    width: 30px;
    outline: none;
    border: 1px solid #ccc;
    padding: 15px;
    font-size: 16px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    margin-left: 15px;
}

.user-details .input-box input{
    height: 45px;
    width: 100%;
    outline: none;
    border: 1px solid #ccc;
    padding-left: 15px;
    font-size: 16px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
    border-color: #9b59b6;
}
form .gender-details .gender-title{
    font-size: 20px;
    font-weight: 500;
}
form .gender-details .category{
    width: 80%;
}
form .button{
    height: 45px;
    margin: 25px 0px;
    box-shadow: 0px 5px 5px #888888;
    border: none;
}
form .button input{
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
form .button input:hover{
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}
@media(max-width: 584){
    .container{
        max-width: 100%;

    }
    form .user-details .input-box{
    margin-bottom: 15px;
    margin: 20px 0 12px 0;
    width: 100%;
}
}
.back{
    text-align: center;
    color: #000;
    font-size: 16px;
    margin-top: 10px;

}
.back p a{
    font-weight: 600;
    text-decoration: none;
}
.danger{
    width: 100%;
    position: relative;
    background: #f2dede;
    padding: 10px;
    color: #a94442;
    height: 40px;
}
.success{
    width: 100%;
    position: relative;
    background: #dff0d8;
    padding: 10px;
    color: #3c763d;
    height: 40px;
}
#message, 
#successMsg{
    float: left;
}
.danger .close{
    float: right;
    cursor: pointer;
    color: #e3bfbf;
}
.success .close{
    float: right;
    cursor: pointer;
    color: #bed8b9;
}


#msgUsername{
    position: absolute;
    margin-left: 100px;
}
#chkBox{
    display: flex;
    left: 0;
    bottom: 0;
    font-size: 18px;
}
#chkBox input{
    position: relative;
    height: 15px;
    width: 40px;
    outline: none;
    border: 1px solid #ccc;
    padding-left: 15px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;

}
</style>


