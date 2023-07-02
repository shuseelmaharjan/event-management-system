<?php

require_once ('php/connection.php');
require_once('header.php');

?>

<!--start of pop-up login form-->
<div class="popup-login" id="popup-login">
        <div class="popup">
            <div class="closeBtn">
                <a href="#" onclick="login_close()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1>Log in</h1>
            <form action="#" method="post">
                <label for="username">Email or Username:</label>
                <input type="text" placeholder="Username or Email" name="username"><br>

                <label for="password">Password:</label>
                <input type="password" placeholder="Password" name="password"><br>
                <button>
                    Log in
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>
                
                    </div>
                </button> <br>
                <div class="loginOption">
                    <span><a href="#">Forget Password</a></span>
                    <span>Not a member? <a href="#popup-signup" onclick="signupBtn()"> <strong>Sign Up</strong> here.</a></span>
    
                </div> 
            </form>
        </div>
    </div>
    <!--end of pop-up login form-->
    <script>
         console.log("Hello");
        function loginbtn(){
            document.getElementById('popup-login').style.display='inline';
            console.log("login");
        }
        function login_close(){
            document.getElementById('popup-login').style.display="none";
            console.log("closeBtn");
        }
    </script>