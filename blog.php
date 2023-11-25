<?php
require_once('php/connection.php');
require_once('header.php');
require_once('nav.php');
?>
    <!--start of a container-->
    <div class="container">
        <div class="heading">
            <h1>Updates</h1>
        </div>
        <div class="wrapper">
        <div class="row" style="grid-template-columns: repeat(3, 1fr);">
            <?php
            $sql = "SELECT id, post_title, publish_date, publish_time, description, image 
            FROM tbl_blog ORDER BY publish_date DESC, publish_time DESC";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                echo"connection error";
            }
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_assoc($result)){
            ?>
                <div class="col">
                        <img src="blogUploads/<?php echo $row['image']; ?>" alt="image">

                        <div class="content">
                            <h1><?php echo $row['post_title']; ?></h1>
                            <p class="truncate"><?php echo $row['description']; ?></p>
                            <!-- <a href="#" class="btn">View Details</a> -->
                            <div class="btns">
                                <a href="view_details.php?id=<?php echo $row['id']; ?>">View Details</a>
                            </div>
                            <p class="postDate"><i class="fa-solid fa-calendar"></i> <?php echo $row['publish_date']; ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            </div>
        </div>

    </div>
<?php
require_once('footer.php');
?>
