<?php
require_once('php/connection.php');
require_once('header.php');
?>


<link rel="stylesheet" href="css/main.css">
<style>
    .container{
        width: 100%;
        background-color: #E9E9E9;    
        height: auto;
        padding-bottom: 40px;
      
        
    }
    .container .wrapper{
        width: 100%;
        background: url(images/services.jpg);
        object-fit: cover;
        min-height: 200px;
        line-height: 200px;
        background-repeat: no-repeat;
        z-index: -99;
    }
    .wrapper h1{
        font-size:36px ;
        color: #fff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        padding: 20px;
        vertical-align: middle;
        display: inline-block;
        margin-left: 15%;
    }
    .row {
        width: 80%;
        height: auto;
        margin: 20px auto 0px auto;
        padding: 10px;
        display: grid;
        grid-gap: 30px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
        font-family: 'Ubuntu', sans-serif;
    }
    .col {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        cursor: pointer;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        border-radius: 15px;
    }
    .row .col img{
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .box{
        padding: 20px;
    }
    .col .truncate {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        margin-bottom: 10px; 
        font-size: 1rem;
        font-weight: 400;
        text-align: left;
        margin: 10px 0px;
        bottom: 0;
    }
    .col .btns{
        display: flex;
        width: 100%;
    }
    .col .btns a{
        padding: 10px 20px;
        background: black;
        color: #fff;
        text-decoration: none;
        border-radius: 15px;
        width: 100%;
    }
    
    
   
</style>
</head>
<?php
require_once('nav.php');
?>
<body>
    <div class="container">
        <div class="wrapper">
            <h1>Our Packages</h1>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT ser_id, ser_name, description, image FROM tbl_service";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col">
                        <img src="serviceUploads/<?php echo $row['image']; ?>" alt="image">
                        <div class="box">
                            <h1><?php echo $row['ser_name']; ?></h1>
                            <p class="truncate"><?php echo $row['description']; ?></p>
                            <div class="btns">
                                <a href="view_packages.php?criteria=<?=$row['ser_id'];?>" onclick="viewDetails()">View Details</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No services found.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
    
</body>


<?php
    require_once('footer.php');
?>

