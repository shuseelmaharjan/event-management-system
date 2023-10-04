
<nav class="navbars">
    <div class="nav">
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

            if ($userAuth->isUserLoggedIn()) {
                $userInfo = $userAuth->getUserInfo();

                $imagePath = $userInfo['image'];
                if (!file_exists($imagePath)) {
                    $imagePath = 'profile/uploads/default.png'; 
                }
                ?>

                <div class="user-profile" id="user-profile">
                    <ul>
                        <li>
                            <img src="<?php echo ($imagePath); ?>" width="70px" alt="profile">
                            <span id="username"><?php echo $userInfo['username']; ?></span>
                            <ul>
                                <li><a href="profile/manage.php">Manage</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <?php
            } else {
                echo '<a href="login.php" class="login-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
                echo '<a href="register.php" class="signup-btn"><i class="fa-solid fa-user"></i> Register</a>';
            }
        ?>

        </div>
    </div>
</nav>


    
