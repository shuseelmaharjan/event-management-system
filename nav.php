<nav class="navbars">
    <div class="nav">
        <!-- Logo -->
        <div class="logo">
            <a class="navbar-brand" href="index.php"><img src="images/logo-white.webp" alt="logo"></a>
        </div>
        <div class="navbar-nav">
            <div class="hamburger">
                <div class="toggle" id="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <ul class="navlist">
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="login" id="login">
            <?php
            require_once('php/connection.php');
            require_once('php/authentication.php');
            $userAuth = new UserAuthentication($conn);

            // validate if the user is logged in
            $userAuth->validateUserLogin();

            if($userAuth->isUserLoggedIn()){
                $userInfo = $userAuth->getUserInfo();
           
                ?>
                
                <div class="user-profile" id="user-profile">
                    <ul>
                        <li>
                        <img src="profile/<?php echo($userInfo['image'])?>" width="70px" alt="profile">
                        <span id="username"><?php echo($userInfo['username']);?></span>
                        <ul>
                            <li><a href="profile/manage.php">Manage</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>

                <?php
            } else {

                ?>

                <?php
                echo '<a href="login.php" class="login-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
                echo '<a href="register.php" class="signup-btn"><i class="fa-solid fa-user"></i> Register</a>';
            }
            ?>
        </div>
    </div>
</nav>


    
<style>
   
 
    .login .user-profile{
        display: flex;
        justify-content: center;
        flex-direction: row;
        position: relative;
    }
 
    .user-profile img{
        vertical-align: middle;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-top: -15px;
    }
    .user-profile span{
        margin-left: 10px;
        color: #fff;

    }
   
    
    #user-profile ul {
        list-style: none;
        margin-top: -20px;
        padding-left: 0;
    }

    #user-profile li {
        color: #fff;
        display: block;
        float: left;
        padding: 1rem;
        position: relative;
        text-decoration: none;
        transition-duration: 0.5s;
    }
    
    #user-profile li a {
    color: #fff;
    }

    #user-profile li:hover {
        cursor: pointer;
    }

    #user-profile ul li ul {
        background: blueviolet;
        visibility: hidden;
        opacity: 0;
        min-width: 5rem;
        position: absolute;
        transition: all 0.5s ease;
        margin-top: 1rem;
        left: 0;
        display: none;
    }

    #user-profile ul li:hover > ul,
    #user-profile ul li ul:hover {
        visibility: visible;
        opacity: 1;
        display: block;
        color: black;
    }

    #user-profile ul li ul li {
        clear: both;
        width: 100%;
    }
    
</style>

