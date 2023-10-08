<?php
require_once('php/connection.php');
require_once('header.php');
?>


<link rel="stylesheet" href="css/main.css">
</head>
<?php
require_once('nav.php');
?>
<body>
<style>
    .container{
        width: 100%;
        background-color: #E9E9E9;    
        height: 100%;
        
    }
    .container .wrapper{
        padding: 40px;
        display: block;
    }

    .container .heading h1{
        font-size: 32px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        margin-left: 10%;
        padding: 40px 20px 0px 20px;
    }
    .container .row{
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(5, 1fr);
        outline: none;
        border-radius: 10px;
        box-shadow: 0px 5px 15px #888888;
    }
    .container .row .col1 img{
        width: 300px;
        height: 180px;
        object-fit: cover;
    }
    .row .col-2{
        margin: auto;
        text-align: center;
        font-size: 1.2rem;
    }
    .row .col-2 a{
        text-decoration: none;
        cursor: pointer;
        font-size: 1.2rem;
        padding: 10px 20px;
        background-color: #02266C;
        color: #fff;
        border-radius: 15px;
        font-size: 600;
    }
    .events{
        width: 50%;
        height: auto;
        background-color: #E9E9E9;
        padding: 20px;
    }
    .events img{
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
    .events .row{
        width: 100%;
        display: grid;
        vertical-align: auto;
        grid-template-columns: repeat(3, 1fr);
        outline: none;

    }

</style>
    <!--popup container-->
    <div class="popup" id="viewDetails">
        <div class="close" onclick="closePopup()">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="events">
            <img src="eventUploads/6518147fc0cc6.jpg" alt="image">
            <h1 id="title"></h1>
            <div class="row">
                <p><strong>Event Date:</strong><span id="dateofStart"></span> to <span id="dateofEnd"></span></p>
                <p><strong>Venue:</strong> <span id="venue"></span></p> <!-- Corrected ID here -->
                <p><strong>Organizer:</strong> <span id="eventOrganizer"></span></p>
            </div>
            <div class="des">
                <p id="desp"></p>
            </div>
        </div>
    </div>
    <!--body container-->
    <div class="container">
        <div class="heading">
            <h1>UPCOMING EVENTS</h1>
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
            <div class="<?php echo $rowClass; ?>">
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
                    <p>to</p>
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
    </div>

<script>
    function openPopup(description) {
        console.log("checking");
        document.getElementById("viewDetails").style.display = "flex";
        document.getElementById("desp").innerText = description;
    }

    function closePopup() {
        document.getElementById("viewDetails").style.display = "none";
    }
</script>
    
</body>


<?php
    require_once('footer.php');
?>