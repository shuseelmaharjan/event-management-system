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
            background-color: #efefef;
            display: block;
        }
        .container .col{
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;


        }
        .container .col img{
            width: 100%;
            height: 500px;
            object-fit: cover;
            margin-top: 30px;
        }
        .container .col h1{
            font-size: 3rem;
            color: #02266C;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .container .col .row{
            display: flex;
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(3, 1fr);
            outline: none;
        }
        .container .col .row p{
            font-weight: 600;
            font-size: 1.2rem;

        }
        .container .col p{
            font-size: 1.3rem;
            line-height: 1.5rem;
        }
        #innerText{
            font-weight: 400;
        }
        .des{
            margin-top: 20px;
        }
        .randomData {
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(3, 1fr);
            outline: none;
        }

        .data {
            background: #efefef;
            padding: 10px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .data img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .data a{
            text-decoration: none;
        }

        .data a h1 {
            font-size: 1.5rem;
            padding: 5px;
            margin: 0; 
            text-decoration: none;
            color: #000;
        }

        
    </style>
<?php 
$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_events WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$output = mysqli_fetch_assoc($result);
?>
<div class="container">
    <div class="col">
        <img src="eventUploads/<?= $output['image'];?>" alt="">
        <h1>
            <?php echo $output["eventName"]; ?>
        </h1>
        <div class="row">
            <p>Event date: </p>
            <p>Organizer: </p>
            <p>Venue: </p>
        </div>
        <div class="row">
            <p><span id="innerText"><?=$output['dateofStart'];?></span> to <span id="innerText"><?=$output['dateofEnd'];?></span></p>
            <p><span id="innerText"><?=$output['eventOrganizer'];?></span></p>
            <p><span id="innerText"><?=$output['venue'];?></span></p>
        </div>
        <div class="des">
        <p><?= $output['description'];?></p>
        </div>
       
    </div>

    <div class="randomData">
        <?php
            $randsql = "SELECT * FROM tbl_events ORDER BY RAND() LIMIT 3";
            $randresult = mysqli_query($conn, $randsql);

            if (mysqli_num_rows($randresult) > 0) {
                while ($row = mysqli_fetch_assoc($randresult)) {
            ?>
                <div class="col-2">
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


</body>


<?php
    require_once('footer.php');
?>
