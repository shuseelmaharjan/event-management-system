<?php
    require_once('php/connection.php');
    require_once('header.php');
?>
<link rel="stylesheet" href="css/style.css">
<?php
require_once('nav.php');
?>
    <!--start of container-->
    <div class="container">
        <div class="heading">
            <h1>Our services</h1>
        </div>
        <div class="wrapper">
            <div class="row" style="grid-template-columns: repeat(3, 1fr);">
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
    </div>

<?php
    require_once('footer.php');
?>

