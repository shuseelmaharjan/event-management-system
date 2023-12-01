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
                                <img src="images/sneaker.jpg" alt="iamge">
                            </div>
                            <div class="col-2">
                                <h1>Admin</h1>
                                <h2>Username: <span>admin</span></h2>
                                <h2>Email: <span>admin@ems.com</span></h2>
                                <h2>phone: <span>909009090</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            Other Details
                        </div>
                        <div class="col-3">
                            <h2>Date of Birth: <span></span></h2>
                            <h2>Father's Name: <span>admin</span></h2>
                            <h2>Mother's Name: <span>admin</span></h2>
                            <h2>Permanent Address: <span>admin</span></h2>
                            <h2>Temporary Address: <span>admin</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button">
                <a href="updateprofile.php">Update Profile</a>
            </div>
        </div>
</div>

<?php
require_once('footer.php');
?>