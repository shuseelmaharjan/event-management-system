<?php

require_once ('php/connection.php');
require_once('header.php');
require_once('nav.php');

?>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once('login.php');
        // require_once('signup.php');
    ?>
    <div class="hero">
        <div class="overlay">
            <div class="wrapper">
                <!--start of left container in landingpage-->
                <div class="content">
                    <div class="texts">
                        <h1 id="title">Music Festival</h1>
                        <h2 id="organizers">The Edge Band</h2>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem reprehenderit enim expedita? Est consectetur laborum quaerat at repellat? Consequuntur est accusantium deserunt vitae atque laudantium inventore enim sapiente excepturi tenetur.</p> -->
                        <div class="eventDetails">
                            <p><strong><i class="fa-solid fa-location-dot"></i> Venue:</strong> Thamel, Kathmandu</p>
                            <p><strong><i class="fa-solid fa-calendar-days"></i> Date:</strong> 30 June, 2023</p>
                        </div>
                        <!-- <button>View more</button> -->
                        <button><a href="#">Join Event</a></button>
                        <!-- <div class="btn"><a href="#">Join Event</a></div> -->
                    </div> 

                </div>
                
                <!--end of left container in landingpage-->
                <!--start of right container in landingpage-->
                                
                <div class="box">
                    <div class="row">

                        <div class="card">
                            <div class="text-box">
                                <h1>Education Fair</h1>
                            </div>
                            <img src="images/covention.jpg" alt="">
                        </div>

                        <div class="card">
                            <div class="text-box">
                                <h1>Art Exhibition</h1>
                            </div>
                            <img src="images/art.png" alt="">
                        </div>

                        <div class="card">
                            <div class="text-box">
                                    <h1>Cultural Festival</h1>
                            </div>
                            <img src="images/newari.jpg" alt="">
                        </div>

                        <div class="card">
                            <div class="text-box">
                                <h1>Your Character</h1>
                            </div>
                            <img src="images/image5.jpg" alt="">
                        </div>

                        <div class="card">
                            <div class="text-box">
                                <h1>Job Fair</h1>
                            </div>
                            <img src="images/job-fair.png" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
            <!--start of background sliders-->
            <div class="sliders">
                    <div class="arrows">
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                           
                        </ul>
                    </div>
                    <div class="number">
                        <p>1</p>
                    </div>
                    

                </div>
                <!--end of background sliders-->
        </div>
    </div>
    <!--end of landing page-->
    <!--start of a container sections-->
    <div class="container">
        <div class="services">
            <div class="heading">
                <h1>Why Us?</h1>

            </div>
            <div class="row">
                <div class="col">
                    <span class="circle"><i class="fa-solid fa-clipboard-list"></i></span>
                    
                    <h1>Experience and Expertise</h1>
                    <p>We have been event organizers since 2005 and have worked extensively with companies from different industries.</p>
                </div>

                <div class="col">
                    <span class="circle"><i class="fa-solid fa-network-wired"></i></span>
                    
                    <h1>VENDOOR NETWORK</h1>
                    <p>We have a vast event vendor network who we work with to plan events for our clients in India,Middle East and South East Asia</p>
                </div>

                <div class="col">
                    <span class="circle"><i class="fa-solid fa-money-bill"></i></span>
                    
                    <h1>COST EFFECTIVE</h1>
                    <p>Our event services are cost effective and impact-full, we work with you to plan your events in sync with budgets assigned.</p>
                </div>

                <div class="col">
                    <span class="circle"><i class="fa-solid fa-user-group"></i></span>
                    
                    <h1>TRANSPARENT</h1>
                    <p>We assure complete transparency and implement it at every step of the event planning process.</p>
                </div>
            </div>
            
        </div>
    </div>
    <!--start of latest event container -->
    <div class="container">
        <div class="latest-event">
            <div class="overlay">
                <h1>Latest Events</h1>
                <blockquote>
                    <table id="eventTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Events</th>
                                <th>Venue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>tde Edge Band</th>
                                <td>Maharjgunuj</td>
                            </tr>
                            <tr>
                                <td>14 July 2023.</td>
                                <td>Mantra Band</th>
                                <td>Duarbarmarg</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </blockquote>
                <a href="events.php"><button>View All Events</button></a>
                
            </div>
            
        </div>
    </div>
    <!--end of latest events-->

    <!--Start of about us-->
    <div class="container">
        <div class="about-us">
            <h1>About Us</h1>
            <h2>Lorem, ipsum dolor sit amet  laborum nesciunt iure, inventore tempora suscipit non enim ipsa odit!</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos beatae mollitia repellendus facilis magni esse sunt magnam quam nihil iusto qui, voluptatibus recusandae obcaecati culpa quaerat, error iste numquam nisi.</p>
            <div class="image">
                <img src="images/about.jpg" alt="image">
            </div>
            <div class="content">
                <h1>WE PLAN AND DELIVER</h1>
                <h2>EVENT SERVICE</h2>
                <h3>to meet your expectation</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, porro distinctio cumque facere suscipit ipsum eos officia. Dicta exercitationem placeat ipsa praesentium sunt, debitis esse ipsum cum ad necessitatibus ab?</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem explicabo impedit, totam quod dolores culpa, vitae fugiat sint error dolor praesentium nemo dolorem consequuntur, eaque porro ullam velit excepturi esse.</p>
            </div>
            <div class="works">
                <h1>Our Past Works</h1>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
 
   <?php
    require_once('footer.php');
   ?>
    <script>
        // function myFunction() {
        //     if (window.pageYOffset > sticky) {
        //         header.classList.add("sticky");
        //     } else {
        //         header.classList.remove("sticky");
        //     }
        //     }
        // console.log("Hello");
        // function loginbtn(){
        //     document.getElementById('popup-login').style.display='inline';
        //     console.log("login");
        // }
        // function login_close(){
        //     document.getElementById('popup-login').style.display="none";
        //     console.log("closeBtn");
        // }
        // function signupBtn(){
        //     document.getElementById('popup-signup').style.display = "inline";
        //     console.log("Signup close");
        //     document.getElementById('popup-login').style.display='none';
        // }
        // function signup_close(){
        //     document.getElementById('popup-signup').style.display = "none";
        //     console.log("signup btn-closed");
        // }
    </script>
</body>
</html>

