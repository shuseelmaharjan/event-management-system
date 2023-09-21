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
                if ($userAuth->isUserLoggedIn()) {
                    $userInfo = $userAuth->getUserInfo();
                    $username = isset($userInfo['username']) ? $userInfo['username'] : '';
                    
                    // default profile image path here
                    $defaultProfileImagePath = 'uploads/default.png';

                    $userImage = isset($userInfo['image']) ? $userInfo['image'] : $defaultProfileImagePath;


                
                    ?>
                    <span class="dropbtn">
                    <?php
						if (!empty($userInfo["image"]) ) {
							?>
							<div class="exist">
								<img src="<?php echo($userInfo["image"]);?>" alt="profile">
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
                        <!-- <img src="<?php echo(htmlspecialchars($userImage)) ?>"  alt="profile"> -->
                        <p><?php echo(htmlspecialchars($username));?></p>
                        

                    </span>
                    <?php
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
