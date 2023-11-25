<?php
    require_once('php/connection.php');
    require_once('header.php');
    require_once('nav.php');

    $id = $_GET['criteria'];
    $sql = "SELECT * FROM tbl_events WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $output = mysqli_fetch_assoc($result);
?>
<div class="container">
    <div class="events-wrapper">
        
        <div class="content">
            <img src="eventUploads/<?= $output['image'];?>" alt="">
            <div class="other-content">
                <h1>
                    <?php echo $output["eventName"]; ?>
                </h1>
                <div class="info-content">
                    <h2>Event Details</h2>
                    <div class="event-info">
                        <div class="col-1">
                            <i class="fa-solid fa-calendar-days"></i>
                            <p>Date: <br><span id="innerText"><?=$output['dateofStart'];?></span> to <span id="innerText"><?=$output['dateofEnd'];?></span></p>
                        </div>
                        <div class="col-1">
                            <i class="fa-solid fa-bars-progress"></i>
                            <p>Organizer: <br><span id="innerText"><?=$output['eventOrganizer'];?></span></p>
                        </div>
                        <div class="col-1">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>Venue: <br><span id="innerText"><?=$output['venue'];?></span></p>
                        </div>
                        <div class="col-1">
                            <i class="fa-solid fa-ticket"></i>
                            <p>Ticketing: <br><span id="innerText">Free Entry</span></p>
                        </div>
                    </div>
                    <div class="des">
                        <p><?= $output['description'];?></p>
                    </div>
                </div>
                <div class="info-content">
                    <h2>Relative Content</h2>
                    
                    <div class="randomData">
                        <?php
                            $randsql = "SELECT * FROM tbl_events ORDER BY RAND() LIMIT 3";
                            $randresult = mysqli_query($conn, $randsql);

                            if (mysqli_num_rows($randresult) > 0) {
                                while ($row = mysqli_fetch_assoc($randresult)) {
                            ?>
                                <div class="col-3">
                                    <div class="data">
                                        <a href="view-event.php?criteria=<?= $row['id'] ?>">
                                            <img src="eventUploads/<?= $row['image'] ?>" alt="image">
                                            <h1><?= $row['eventName']; ?></h1>
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


</body>


<?php
    require_once('footer.php');
?>
