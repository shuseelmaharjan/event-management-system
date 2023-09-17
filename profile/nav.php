 <nav class="navbars">
    <div class="nav">
        <!--logo-->
        <div class="logo">
            <a class="navbar-brand" href="../index.php"><img src="../images/logo-white.webp" alt="logo"></a>
        </div>
        <div class="navbar-nav">
            <div class="hamburger">
                <div class="toggle" id="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <ul class="navlist">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../events.php">Events</a></li>
                <li><a href="../services.php">Services</a></li>
                <li><a href="../blog.php">Blog</a></li>
                <li><a href="../contact.php">Contact</a></li>
            </ul>
            <!--navbar-login-->
        </div>
        <div class="dropdown">
            <?php
            // Assuming $userAuth is an instance of UserAuthentication with validateUserLogin called.
            if ($userAuth->isUserLoggedIn()) {
                $userInfo = $userAuth->getUserInfo();
                $username = isset($userInfo['username']) ? $userInfo['username'] : '';
                echo '<span class="dropbtn"><i class="fa-solid fa-user"></i>Welcome, ' . htmlspecialchars($username) . '</span>';
            }
            ?>
        </div>
        <!--navbar-->
    </div>
</nav>


              
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

 
    .dropbtn {
        color: #fff;
        padding: 16px;
        font-size: 16px;
        border: none;
    }
    .dropbtn i{
        padding: 0px 15px;
    }
    .dropdown {
        position: relative;
        display: inline-block;
        padding: 33px 0px;
        width: 20%;
        text-align: center;
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
