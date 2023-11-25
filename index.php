<?php
require_once('php/connection.php');

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="css/Owlmin.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/home.css">

    <link href="css/Bootstrapmin.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>
<body> 
    <!--navbar-->
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
                        session_start();
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            $username = $_SESSION['username'];

                            $imagePath = 'profile/default.png';

                            $sql = "SELECT id, image FROM tbl_users WHERE username = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows === 1) {
                                $row = $result->fetch_assoc();
                                if ($row['image'] !== null && $row['image'] !== '') { // Check for empty string as well
                                    $imagePath = 'profile/' . $row['image'];
                                }
                            }
                            ?>

                            <div class="user-profile" id="user-profile">
                                <ul>
                                    <li>
                                        <div class="profile-info">
                                            <img src="<?= $imagePath ?>" width="50px" alt="profile">
                                            <span id="username"><?= $username ?></span>
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
    <!--end of navbar-->



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
    
    <div class="container">
        <div class="row">
            <?php 

             $sql = "SELECT id, image, eventName, venue FROM tbl_events WHERE ad_status='active' LIMIT 3";
             $result = mysqli_query($conn, $sql);
             if (!$result) {
                 die("Error executing the query: " . mysqli_error($conn));
             }

            while ($row = mysqli_fetch_assoc($result)) { ?>
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

    <script src="js/Jquery.js"></script>
    <script src="js/Owlmin.js"></script>                
    <script src="js/script.js"></script>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>

