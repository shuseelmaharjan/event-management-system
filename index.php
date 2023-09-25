<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'><link rel="stylesheet" href="./style.css">
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