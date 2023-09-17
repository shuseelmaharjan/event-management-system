<?php
// session_start();
// require_once('vendor/autoload.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// // Function to generate a random OTP
// function generateOTP() {
//     return strval(rand(1000, 9999)); 
// }

// // Function to send OTP to a user's email
// function sendOTP($email, $otp) {
//     $mail = new PHPMailer(true);

//     try {
//         // Configure PHPMailer as shown in previous responses

//         // Sender and recipient information
//         $mail->setFrom('otp@ems.com', 'Event Management System');
//         $mail->addAddress($email);

//         // Email content
//         $mail->isHTML(true);
//         $mail->Subject = 'Your OTP Code';
//         $mail->Body = "Your OTP code is: $otp";

//         // Send the email
//         $mail->send();
//         return true; // Email sent successfully
//     } catch (Exception $e) {
//         return false; // Email could not be sent
//     }
// }

// // Example usage:
// $newUserEmail = $_SESSION['email'];
// $otp = generateOTP();

// if (sendOTP($newUserEmail, $otp)) {
//     echo "OTP sent successfully to $newUserEmail";
// } else {
//     echo "OTP could not be sent to $newUserEmail";
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Register</title>
    <!--fontawesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--css link-->
    <link rel="stylesheet" href="css/log.css">
</head>
<body>
    <div class="verification"n id="verify">
        <!--header section start here -->
        <div class="center">
            <section>
                <div class="close" id="closeBtn" ><i onclick="closeVerify()" class="fa-solid fa-xmark"></i></div>
                <div class="title">OTP Verification</div>

                <p>We have sent a verification code to<br></p>
                <p id="userEmail"></p>

                <div class="image">
                    <img src="images/shield.svg"  alt="verify">
                </div>
                
                <div id='inputs'>
                    <input id='input1' type='number' maxLength="3" />
                    <input id='input2' type='number' maxLength="1" />
                    <input id='input3' type='number' maxLength="1" />
                    <input id='input4' type='number' maxLength="1" />
                    <input id='input5' type='number' maxLength="1" />
                    <input id='input6' type='number' maxLength="1" />
                </div>
                <button>Verify</button>
                <div class="resend">
                    <p>Resend OTP in</p>
                    <p>01:04</p>
                </div>
            </section>
        </div>
    </div>
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
                <input type="submit" onclick="userVerify()" value="Register">
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


       
        //page otp verification
        document.getElementById("verify").style.display="none";

            const inputs = ["input1", "input2", "input3", "input4", "input5", "input6"];

            inputs.map((id) => {
            const input = document.getElementById(id);
            addListener(input);
            });

            function addListener(input) {
            input.addEventListener("keyup", () => {
                const code = parseInt(input.value);
                if (code >= 0 && code <= 9) {
                const n = input.nextElementSibling;
                if (n) n.focus();
                } else {
                input.value = "";
                }

                const key = event.key; // const {key} = event; ES6+
                if (key === "Backspace" || key === "Delete") {
                const prev = input.previousElementSibling;
                if (prev) prev.focus();
                }
            });
            }

            function closeVerify(){
            document.getElementById("verify").style.display="none";
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

            // Check if the email already exists in the database
            $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if($stmt->rowCount()>0){
                echo '<script>';
                echo 'document.getElementById("danger").style.display="inline-block";';
                echo'document.getElementById("message").innerText = "This email is already exist on database, please use different one.";';
                echo '</script>';
            }else{
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
                    // Check if doesnot passwords match
                    if ($password !== $confirmPassword) {
                        echo '<script>';
                        echo 'document.getElementById("danger").style.display="inline-block";';
                        echo'document.getElementById("message").innerText = "Password doesnot match";';
                        echo '</script>';
                    } else {
                    

                        
                        // Hash the password (use a suitable password hashing library)
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $currentDate = date("Y-m-d"); // Returns the current date in "YYYY-MM-DD" format
                       
                        // Insert data into the database
                        $insertStmt = $conn->prepare("INSERT INTO tbl_users (name, email, phone, username, dob, gender, dateofjoin, password) VALUES (:name, :email, :phone, :username, :dob, :gender, :dateofjoin, :password)");
                        $insertStmt->bindParam(':name', $name);
                        $insertStmt->bindParam(':email', $email);
                        $insertStmt->bindParam(':phone', $phone);
                        $insertStmt->bindParam(':username', $username);
                        $insertStmt->bindParam(':dob', $dob);
                        $insertStmt->bindParam(':gender', $gender);
                        $insertStmt->bindParam(':dateofjoin', $currentDate);
                        $insertStmt->bindParam(':password', $hashedPassword);
                        $insertStmt->execute();

                        echo '<script>';
                        echo 'document.getElementById("success").style.display="inline-block";';
                        echo'document.getElementById("successMsg").innerText = "Account Created Successfully.";';
                        echo '</script>';
                    }
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



