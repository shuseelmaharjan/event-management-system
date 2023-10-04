<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'><link rel="stylesheet" href="./style.css">
    <style>
  
    .navbars{
        font-family: 'Ubuntu', sans-serif;
        position: absolute;
        z-index: 2;
        font-size: 16px;
        font-weight: 400;
        width: 100%;
        height: 70px;
        border-bottom: 1px solid #ffffff62;

    }
    .navbars .nav{
        width: 100%;
        position: absolute;
        display: flex;
    }
    /**************** start of logo *****************/
    .navbars .logo{
        width: 20%;
        margin-left: 5%;
        padding: 20px 0px 0px 0px;
    }
    .navbars a img{
        width: 150px;
        position: absolute;
        align-items: center;
    }
    /**************** end of logo *****************/
    /**************** start of navlist *****************/
    .navbar-nav .hamburger{
        display: none;
    }
    .navbars .navbar-nav{
        width: 60%;
        display: inline;
        margin-top: 35px;
    }
    .navbars .navbar-nav ul{
        float: right;
    }
    .navbars .navbar-nav ul li{
        list-style: none;
        float: left;
        padding: 0px 20px;
    }
    .navbars .navbar-nav ul li a{
        color: #fff;
        text-decoration: none;
    }
    #login::before {
        content: "";
        background-color: #fff;
        position: absolute;
        width: 1px;
        height: 25px;
        top: 30px;
        display: block;
    }
    /**************** end of navlist *****************/
    /**************** start of account login/signup *****************/
    .nav .login{
        width: 20%;
        display: inline;
        margin-top: 35px;
    }  
    .nav .login a{
        text-decoration: none;
        color: #fff;
        padding: 0px 20px;
    }
    .nav .login a i{
        margin-right: 5px;
    }
 
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
</head>
<body>
    <!-- HEADER SECTION STARTS -->
    <?php
      require_once('nav.php');
    ?>
    <!-- HEADER SECTION ENDS -->
    <!-- INFORMATION SECTION STARTS -->
    <main>
        <div>
            <span>Discover</span>
            <h1>Event Management</h1>
            <hr>
            <p color="#fff">Beauty" and mystery are hidden under the sea. Explore with our application to know about Aquatic Animals.</p>
            <a href="#">download app</a>
        </div>
    <!-- INFORMATION SECTION ENDS -->

    <!-- ANIMATED SLIDER SECTION STARTS -->
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide--one">
                <div>
                    <h2>Art</h2>
                    <p>Jellyf"ish and sea jellies are the informal common names give to the medusa-phase of certain gelatinous members of the subphylum Medusozoa, a major part of the phylum Cnidaria.</p>
                    <a href="#" target="_blank">explore</a>
                </div>
            </div>

            <div class="swiper-slide swiper-slide--two">
                <div>
                  <h2>Convocation</h2>
                  <p>
                    Seahorses are mainly found in shallow tropical and temperate salt water throughout the world. They live in sheltered areas such as seagrass beds, estuaries, coral reefs, and mangroves. Four species are found in Pacific waters from North America to South America.
                  </p>
                  <a href="" target="_blank">explore</a>
                </div>
              </div>
        
              <div class="swiper-slide swiper-slide--three">
        
                <div>
                  <h2>Seminar</h2>
                  <p>
                    Octopuses inhabit various regions of the ocean, including coral reefs, pelagic waters, and the seabed; some live in the intertidal zone and others at abyssal depths. Most species grow quickly, mature early, and are short-lived.
                  </p>
                  <a href="" target="_blank">explore</a>
                </div>
              </div>
        
              <div class="swiper-slide swiper-slide--four">
        
                <div>
                  <h2>Concert</h2>
                  <p>
                    Sharks are a group of elasmobranch fish characterized by a cartilaginous skeleton, five to seven gill slits on the sides of the head, and pectoral fins that are not fused to the head.
                  </p>
                  <a href="" target="_blank">explore</a>
                </div>
              </div>
   
              <div class="swiper-slide swiper-slide--five">
        
                <div>
                  <h2>Art Gallery</h2>
                  <p>
                    Dolphins are widespread. Most species prefer the warm waters of the tropic zones, but some, such as the right whale dolphin, prefer colder climates. Dolphins feed largely on fish and squid, but a few, such as the orca, feed on large mammals such as seals.
                  </p>
                  <a href="" target="_blank">explore</a>
                </div>
              </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
       
    </main>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script><script  src="./script.js"></script>
    <script src="./script.js"></script>
    
</body>
</html>