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
        <div class="login" id="login">
        <?php
                if ($userAuth->isUserLoggedIn()) {
                    $userInfo = $userAuth->getUserInfo();
                    $username = isset($userInfo['username']) ? $userInfo['username'] : '';
                    
                    // default profile image path here
                    $defaultProfileImagePath = 'uploads/default.png';

                    $userImage = isset($userInfo['image']) ? $userInfo['image'] : $defaultProfileImagePath;


                
                    ?>
            <div class="user-profile" id="user-profile">
                <ul>
                    <li>
                    <?php
						if (!empty($userInfo["image"]) ) {
							?>
                        <div class="profile-info">
                            <img src="<?php echo($userInfo["image"]);?>" alt="profile">
                            <span id="username"><?= $username ?></span>
                        </div>
                        <?php
						} else {
							?>
                            <div class="default">
								<img src="uploads/default.png"  alt="default img">
							</div>
							<?php
						}
					?>
                       
                    </li>
                </ul>
            </div>
            <?php
                }
            ?>
        </div>
 
        <!--navbar-->
    </div>
</nav>


              
<style>


</style>
<script>
    
</script>
