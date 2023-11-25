<?php
require_once('header.php');
require_once('sidebar.php');
require_once('php/authentication.php');
?>
<style>
   .box form{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
    }
    .box form .input-box,
    #banner,
    #description{
        padding: 0px 10px;
    }
    .box form .input-box label {
        font-size: 1rem;
        font-weight: 600;
        display: block;
        margin: 10px 0px;
    }
    .box form .input-box input,
    .box form .input-box select{
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
    }
    .box form .input-box input[type=text], select, textarea{
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .two-columns{
        grid-column: span 2;
    }
    #description label{
        font-size: 1rem;
        font-weight: 600;
    }
    #my-textarea {
        width: 100%;
        min-height: 200px;
        resize: none;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
        margin: 10px 0px;
    }
    #button{
        grid-column: 3;
        margin-bottom: 20px;
    }
    #button button{
        color: #fafafb;
        background:  #1177aa;
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        font-weight: 600;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 15px;
        cursor: pointer;
    }
    #banner .input-box input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    #banner .input-box input {
        display:none;
    }
    #banner .input-box img {
        width:100%;
        height: 180px;
        object-fit:cover;
        cursor: pointer;
        box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
    }
    #banner .input-box div {
        position:relative;
        height:40px;
        margin-top:-40px;
        background:rgba(0,0,0,0.5);
        text-align:center;
        line-height:40px;
        font-size:13px;
        color:#f5f5f5;
        cursor: pointer;
        font-weight:600;
    }
    #banner div span {
        font-size:40px;
    }
    .active {
        background-color: #22a613;
        color: white; 
        padding: 3px 10px;
        border-radius: 3px; 
        text-transform: capitalize;
    }

    .expired {
        background-color: #b90f0f;
        color: white; 
        padding: 3px 10px;
        border-radius: 3px; 
        text-transform: capitalize;
    }
    .info ul li{
        list-style: none;
    }
    .info ul{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        margin: 10px 0px;
    }
    
</style>
<?php 
$id = $_GET['criteria'];
$sqlService = "SELECT s.ser_name, s.image, s.description, t.name AS event_type
                    FROM tbl_service s
                    LEFT JOIN tbl_types t ON s.type = t.type_id
                    WHERE s.ser_id = '$id'";
        $resultService = mysqli_query($conn, $sqlService);

        if (!$resultService) {
            echo "Connection error: " . mysqli_error($conn);
        } else {
            $serviceData = mysqli_fetch_assoc($resultService);
        }

        $sqlPackages = "SELECT p.pkg_name, p.pkg_cost, p.pkg_guest, p.pkg_description
                        FROM tbl_packages p
                        WHERE p.service_id = '$id'";
        $resultPackages = mysqli_query($conn, $sqlPackages);

        if (!$resultPackages) {
            echo "Connection error: " . mysqli_error($conn);
        }
    ?>



<div class="main">
        <div class="main-header">
            <div class="main-title">
                View Service
            </div>
            <?php
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <a href="services.php">
                        <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                        </div>
                    </a>
                    <div class="box">
                        <h1><?=$serviceData['ser_name']?></h1>
                        <img src="../serviceUploads/<?=$serviceData['image']?>" alt="image">
                        <p><?=$serviceData['description']?></p>
                    </div>
                    <?php
                            while ($packageData = mysqli_fetch_assoc($resultPackages)) {
                            ?>
                    <div class="box">
                    <div class="package">
                            
                                <div class="info">
                                    <h2>Package: <?php echo $packageData['pkg_name']; ?></h2>
                                    <ul>
                                        <li><span>Package Cost: </span><?php echo $packageData['pkg_cost']; ?></li>
                                        <li><span>Package Limit Guests: </span><?php echo $packageData['pkg_guest']; ?></li> 
                                    </ul>
                                    <div class="des">
                                        <span>Package Description: </span><?php echo $packageData['pkg_description']; ?>
                                    </div>
                                </div>
                             
                        </div>
                    </div>
                    <?php
                            }
                        
                            ?>
                </div>
            </div>
        </div>
  
</div>
<script>
     var currentPage = window.location.href;

    var eventsLink = document.querySelector('a[href="services.php"]');

    if (currentPage.includes("view-service.php")) {
        eventsLink.classList.add("active");
    }
</script>

<?php

require_once('footer.php');
?> 