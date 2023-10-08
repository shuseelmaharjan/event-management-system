<?php
require_once('php/connection.php');

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="Owlmin.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/home.css">

    <link href="Bootstrapmin.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>
<body>
    <style>
        .nav .login{
            margin-top: 0px;
        }
    </style>

        
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
                    
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            $username = $_SESSION['username'];

                            $imagePath = 'path_to_default_image.png';

                            $sql = "SELECT id, image FROM tbl_users WHERE username = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            if ($result->num_rows === 1) {
                                $row = $result->fetch_assoc();
                                $imagePath = $row['image'];
                            }
                            ?>
                            <div class="user-profile" id="user-profile">
                                <ul>
                                    <li>
                                        <div class="profile-info">
                                            <img src="profile/<?=$imagePath?>" alt="profile">
                                            <span id="username"><?=$username?></span>
                                        </div>
                                        <ul id="dropdown">
                                            <li><a href="reservation.php">My Reservation</a></li>
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



        <div class="owl-slider" >
           
            <?php
            $sql = "SELECT image FROM tbl_events";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                ?>
                <div id="carousel" class="owl-carousel">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imageUrl = $row['image'];
                        ?>
                        <div class="item">
                        <img width="300px" height="300px" style="object-fit: cover;" src="eventUploads/<?php echo $imageUrl; ?>" alt="">
                        </div>
                        <?php
                                }
                            ?>
                        
                </div>
                <?php
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            ?>
        </div>

    <section style="font-size: 2em; text-align: center; margin-bottom: 3%; margin-top: 2%;">
        Upcoming Events
    </section>  
        <?php 

        $sql = "SELECT id, image, eventName, venue FROM tbl_events WHERE ad_status='active' LIMIT 3";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Query failed; handle the error
            die("Error executing the query: " . mysqli_error($conn));
        }
        ?>
        <div class="container">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card card-01 height-fix">
                            <a href="view-event.php?criteria=<?php echo$row['id']?>">
                                <img class="card-img-top" width="200px" height="400px" style="object-fit: cover;" src="eventUploads/<?php echo $row['image']; ?>" alt="Card image cap">
                                <div class="card-img-overlay">
                                    <h4 class="card-title"><strong><?php echo $row['eventName']; ?></strong></h4>
                                    <p class="card-text">Venue: <?php echo $row['venue']; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>


        

        <script src="Jquery.js"></script>
        <script src="Owlmin.js"></script>
            <script>
                jQuery("#carousel").owlCarousel({
            autoplay: true,
            rewind: true, /* use rewind if you don't want loop */
            margin: 20,
             /*
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            */
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 7000,
            smartSpeed: 800,
            nav: true,
            responsive: {
              0: {
                items: 1
              },
          
              600: {
                items: 3
              },
          
              1024: {
                items: 4
              },
          
              1366: {
                items: 4
              }
            }
          });
            </script>
</body>
</html>

<?php
    require_once('footer.php');
?>