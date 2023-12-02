<body>
    <!--start of navbar-->
    <nav class="navbars">
        <div class="nav">
            <div class="logo">
                <a class="navbar-brand" href="index.php"><img src="images/logo-white.webp" alt="logo"></a>
            </div>
            <div class="navbar-nav">
                
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

                    $imagePath = 'images/user.png';

                    $sql = "SELECT id, image FROM tbl_users WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $row = $result->fetch_assoc();
                        if ($row['image'] !== null && $row['image'] !== '') { 
                            $imagePath =  $row['image'];
                        }
                    }
                    ?>

                    <div class="user-profile" id="user-profile">
                        <ul>
                            <li>
                                <div class="profile-info">
                                    <img src="<?= $imagePath ?>" alt="profile">
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
    <div class="messageBox" id="messageBox">
        <p id="displayMsg"></p>
        <p onclick="closemessageBox()" id="closeBtn"><i class="fa-solid fa-xmark"></i></p>
    </div>
    <!--end of navbar-->
