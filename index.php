<?php

require_once ('php/connection.php');
require_once('header.php');
require_once('nav.php');

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
    <!--start of pop-up signup form-->
    <div class="popup-signup" id="popup-signup">
        <div class="signup">
            <div class="closeBtn">
                <a href="#" onclick="signup_close()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1>Sign Up</h1>
            <form action="php/signup.php" method="post">
                <label for="name">Full Name:</label><br>
                <input type="text" name="name" placeholder="Full Name" required><br>
                <!--email-->
                <label for="email">Email:</label><br>
                <input type="email" name="email" placeholder="Email"><br>
                <label for="phone">Phone:</label><br>
                <input type="number" name="phone" placeholder="Phone"><br>

                <!--password-->
                <label for="password">New Password:</label><br>
                <input type="password" name="newpassword" placeholder="New Password"><br>
                <label for="password">Confirm Password:</label><br>
                <input type="password" name="password" placeholder="Confirm Password"><br>

                <button>
                    Sign up
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>
                    </div>
                </button> 

            </form>
        </div>
    </div>
    <!--end of pop-up signup form-->



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
                <button><a href="events.php">View All Events</a></button>
                
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
    <footer>
        <div class="logo">
            <a href="index.php"><img src="images/logo-white.webp" width="250px" alt="logo"></a>
            <ul>
                <li><a href="#">Who We Are</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="right-content">
            <div class="icons">
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
            <p>&copy; 2021 Copyright: All rights reserved.</p>
        </div>
    </footer>
   
    <script>
        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
            }
        console.log("Hello");
        function loginbtn(){
            document.getElementById('popup-login').style.display='inline';
            console.log("login");
        }
        function login_close(){
            document.getElementById('popup-login').style.display="none";
            console.log("closeBtn");
        }
        function signupBtn(){
            document.getElementById('popup-signup').style.display = "inline";
            console.log("Signup close");
            document.getElementById('popup-login').style.display='none';
        }
        function signup_close(){
            document.getElementById('popup-signup').style.display = "none";
            console.log("signup btn-closed");
        }
    </script>
</body>
</html>

