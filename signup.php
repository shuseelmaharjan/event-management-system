<?php

require_once ('php/connection.php');
require_once('header.php');

?>

<div class="popup-signup" id="popup-signup">
        <div class="signup">
            <div class="closeBtn">
                <a href="#" onclick="signup_close()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1>Sign Up</h1>
            <form action="php/signup.php" method="post">
                <label for="name">Full Name:</label><br>
                <input type="text" name="name" placeholder="Full Name" required><br>
                <!--email-->
                <label for="email">Email:</label><br>
                <input type="email" name="email" placeholder="Email"><br>
                <label for="phone">Phone:</label><br>
                <input type="number" name="phone" placeholder="Phone"><br>

                <!--password-->
                <label for="password">New Password:</label><br>
                <input type="password" name="newpassword" placeholder="New Password"><br>
                <label for="password">Confirm Password:</label><br>
                <input type="password" name="password" placeholder="Confirm Password"><br>

                <button>
                    Sign up
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>
                    </div>
                </button> 

            </form>
        </div>
    </div>
    <!--end of pop-up signup form-->
    <script>
        function signupBtn(){
            document.getElementById('popup-signup').style.display = "inline";
            console.log("Signup close");
            document.getElementById('popup-login').style.display='none';
        }
        function signup_close(){
            document.getElementById('popup-signup').style.display = "none";
            console.log("signup btn-closed");
        }
    </script>