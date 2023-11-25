<?php
require_once('php/connection.php');
require_once('header.php');
require_once('nav.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="events-wrapper">
            <div class="content">
                <div class="other-content">
                    <h1 style="padding: 30px 0px;"><?php echo $row["post_title"]; ?></h1>
                    <img src="eventUploads/<?= $row['image'];?>" alt="">
                    <div class="info-content" id="blog-details">
                        <p><strong>Published Date: </strong><span><?=$row['publish_date'];?></span></p>
                        <p><strong>Author: </strong><span><?=$row['author_name'];?></span></p>
                        <p><strong>Published Time: </strong><span><?=$row['publish_time'];?></span></p>
                    </div>
                    <div class="des">
                        <p><?=$row['description'];?></p>
                    </div>
                    <div class="info-content">
                    <h2>Relative Post</h2>
                    
                    <div class="randomData">
                        <?php
                            $randsql = "SELECT * FROM tbl_blog ORDER BY RAND() LIMIT 2";
                            $randresult = mysqli_query($conn, $randsql);

                            if (mysqli_num_rows($randresult) > 0) {
                                while ($output = mysqli_fetch_assoc($randresult)) {
                            ?>
                                    <div class="col-3">
                                        <div class="data">
                                            <a href="view_details.php?id=<?= $output['id'] ?>">
                                                <img src="blogUploads/<?= $output['image'] ?>" alt="image">
                                                <h1><?= $output['post_title']; ?></h1>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No random data found.";
                            }
                        ?>
                    </div>
                </div>
                </div>
                
            </div>
        </div>

    </div>
<?php
    require_once('footer.php');
?>
