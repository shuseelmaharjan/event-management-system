<?php
// Usage
include 'php/connection.php';
include 'php/authentication.php';
$userAuth = new UserAuthentication($conn);
$userInfo = $userAuth->getUserInfo();
?>
<nav class="navbars">
    <div class="nav">
        <!--logo-->
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
            <!--navbar-login-->
        </div>
        <?php

        if ($userInfo !== null) {
            // User is logged in, display user-specific information
            echo 'Welcome, ' . htmlspecialchars($userInfo['username']);
            // Display other user information here
        } else {
            ?>
            <div class="login" id="login">
                      <!-- <span id="login"><i class="fa-solid fa-user"></i> Login</span> -->
                      <a href="login.php" class="login-btn" ><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                      <a href="register.php" class="signup-btn"><i class="fa-solid fa-user"></i> Register</a>
                  </div>
            <?php
        }
        ?>
        <!--navbar-->
    </div>
</nav>


        <div class="dropdown">
            
                    <span class="dropbtn">
                        <img src="profile/class/<?php echo(htmlspecialchars($userImage)) ?>"  alt="profile">
                        <p><?php echo(htmlspecialchars($username));?></p>
                        

                    </span>
                    <div class="dropdown-content">
                <a href="profile/manage.php"><i class="fa-regular fa-face-smile"></i> Manage my account</a>
                <a href="#"><i class="fa-solid fa-calendar"></i> My Reservations</a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
            </div>

        </div>


              
<style>
   
  .users{
    width: 10%;
    display: inline-block;
    margin-top: 35px;
    color: #fff;
    text-align: center;
    }  
    #user i{
        padding: 0px 10px
    }
    #user {
        position: relative;
        display: inline;
        cursor: pointer;
    }
    #dropdownUser{
        display: none;
        margin-top: 20px;
        background-color: #fff;
        color: #000;
    }
    #user:hover #dropdownUser{
        background-color: yellow;
    }
    #dropdownUser ul{
        padding: 10px 0px;
    }
    #dropdownUser ul li{
        padding: 15px 0px;
    }
    #dropdownUser ul li a{
        text-decoration: none;
        font-size: 18px;
    }
    .dropdownUser a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

 
   
    .dropdown {
        position: relative;
        display: flex;
        justify-content: center;
        padding: 33px 0px;
        width: 20%;
        text-align: center;
    }
    .dropbtn {
        color: #fff;
        font-size: 16px;
        border: none;
        display: flex;
        cursor: pointer;
    }
    .dropbtn img{
        vertical-align: middle;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-top: -15px;
    }
    .dropbtn p{
        margin-left: 10px;
    }
    .dropdown-content {
        display: none;
        /* position: absolute; */
        background-color: #f1f1f1;
        width: 250px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        margin: 20px auto 0px auto;
        text-align: left;
    }
    .dropdown-content a i{
        color: #a80b59;
        padding: 0px 10px;
    }
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

</style>
<script>
    
</script>
