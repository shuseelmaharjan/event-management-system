<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
    .box .row-1{
        display: flex;
        margin-top: 20px;
    }
    .box .col-1{
        width: 150px;
    }
    .box .col-1 img{
        width: 150px;
        height: 150px;
        object-fit: cover;
        cursor: pointer;
    }
    .box .col-2{
        padding: 20px;
        margin-left: 30px;
        width: 300px;
    }
    .col-2 h1{
        font-size: 1.5rem;
    }
    .col-2 h2{
        font-size: 1rem;
        margin: 5px 0px;
    }
    .col-3{
        margin-top: 20px;
    }
    .col-3 h2{
        font-size: 1rem;
        margin: 5px 0px;
    }
    .button a{
        background-color: #22a613;
        color: #fff;
        font-weight: 600;
        padding: 10px 20px;
        cursor: pointer;
        float: right;
    }
   
</style>
<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            Edit Profile
        </div>
        <?php 
            require_once('profile.php');
        ?>
    </div>
    <div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Personal Details
                </div>
                <div class="row-1">
                    <div class="col-1">
                        <?php
                            // Retrieve the image URL from the database
                            $imageURL = "images/default-1.png"; // Replace with the actual column name for the image in your database

                            echo "<img src='$imageURL' alt='image'>";
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                        $sql = "SELECT * FROM tbl_admin WHERE id = 1";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        // Check if any row is returned
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            // Retrieve other details from the database
                            $username = $row['username']; // Replace with the actual column name for the username in your database
                            $fullName = $row['name']; // Replace with the actual column name for the full name in your database
                            $email = $row['email']; // Replace with the actual column name for the email in your database
                            $phone = $row['phone']; // Replace with the actual column name for the phone in your database

                            echo "<h1>Role: Admin</h1>";
                            echo "<h2>Username: <span>$username</span></h2>";
                            echo "<h2>Full Name: <span>$fullName</span></h2>";
                            echo "<h2>Email: <span>$email</span></h2>";
                            echo "<h2>Phone: <span>$phone</span></h2>";
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="button">
            <a href="updateprofile.php">Update Profile</a>
        </div>
        </div>
    </div>
</div>

        
        
    </div>
</div>


<?php
require_once('footer.php');
?>