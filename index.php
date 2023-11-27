<?php
require_once('php/connection.php');
require_once('header.php');
require_once('nav.php');
?>
<div class="container" style="background-color: #fff;">
    <div class="owl-slider">
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
                        <img src="eventUploads/<?php echo $imageUrl; ?>" alt="images">
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
    <div class="event-row">
        <div class="heading">
            <h1>Upcoming Events</h1>
        </div>
        <div class="event-wrapper">
            <?php

            $sql = "SELECT id, image, eventName, venue FROM tbl_events WHERE ad_status='active' LIMIT 3";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Error executing the query: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="event-col">
                    <div class="card ">
                        <a href="view-event.php?criteria=<?php echo $row['id'] ?>">
                            <img src="eventUploads/<?php echo $row['image']; ?>" alt="Card image cap">
                            <div class="card-img-overlay">
                                <div class="text">
                                    <h1 class="card-title"><strong><?php echo $row['eventName']; ?></strong></h1>
                                    <p class="card-text">Venue: <?php echo $row['venue']; ?></p>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once('footer.php');
?>