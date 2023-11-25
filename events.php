<?php
require_once('php/connection.php');
require_once('header.php');
?>
    <link rel="stylesheet" href="css/style.css">
<?php
require_once('nav.php');
?>
    <!--body container-->
    <div class="container" >
        <div class="heading">
            <h1>UPCOMING EVENTS</h1>
        </div>
            <div class="wrapper">
            <?php
                $sql = "SELECT e.*, t.name AS event_type_name
                        FROM tbl_events e
                        LEFT JOIN tbl_types t ON e.eventType = t.type_id WHERE e.ad_status = 'active'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $rowCount = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $rowCount++;

                        $rowClass = ($rowCount > 1) ? 'row with-gap' : 'row';

            ?>
                <div class="<?php echo $rowClass; ?>" style="grid-template-columns: repeat(5, 1fr);">
                    <?php 
                        $title = $row['eventName'];
                        $des = $row['description'];
                        $venue = $row['venue'];
                        $dos = $row['dateofStart'];
                        $doe = $row['dateofEnd'];
                        $organizer = $row['eventOrganizer'];
                    ?>
                    <div class="col1">
                        <img src="eventUploads/<?php echo $row['image']; ?>" alt="Event Image">
                    </div>

                    <div class="col-2">
                        <p><?php echo $dos?></p>
                        <p> to </p>
                        <p><?php echo $doe;?></p>
                    </div>

                    <div class="col-2">
                        <p><strong><?php echo $title?></strong></p>
                    </div>
                    <div class="col-2">
                        <p><strong>Venue: </strong><?php echo $venue; ?></p>
                    </div>
                    <div class="col-2">
                        <a href="view-event.php?criteria=<?= $row['id']?>">View Details</a>
                    </div>

                </div>

                <?php
                    }
                } else {
                    echo "No upcoming events found.";
                }
                ?>

            </div>
    </div>
<?php
    require_once('footer.php');
?>