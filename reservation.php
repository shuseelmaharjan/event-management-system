<?php
require_once('php/connection.php');
require_once('header.php');
?>
<link rel="stylesheet" href="css/main.css">
</head>
<?php 
require_once('nav.php');
?>

<style>
    .container{
        background-color: #ccc;
        height: auto;
        padding-top: 50px;
    }
    .box{
        width: 60%;
        padding: 60px 30px 40px 30px;
        font-family: 'Ubuntu', sans-serif;
        margin: 0px auto;
        background-color: #fff;
        text-align: center;
    }
    .box .row{
        width: 80%;
        margin: 30px auto;
        border: 1px solid #ccc;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        border-radius: 20px;
        grid-gap: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    .box .row .col{
        text-align: left;
    }
    .box .row .col h1{
        font-size: 1em;
        font-weight: 600;

    }
    .box .row .col span{
        font-size: 1em;
        font-weight: 400;
    }
    .box .row .col-1{
        display: flex;
        grid-column: span 2;
        justify-content: space-between;
        align-items: center;
        
    }
    .box .col-1 h1{
        font-size: 1em;
        font-weight: 600;
        text-align: left;
    }
    .box .col-1 span{
        font-weight: 400;
    }
    .btn input{
        width: 100%;
        font-size: 1.2em;
        font-weight: 600;
        padding: 10px;
        border: none;
        color: #fff;
        cursor: pointer;
    }
   
    #cancel{
        grid-column: 3;
        padding: 10px;
    }
  
    .cancel{
        background-color: red;
    }
  
</style>
<body>
<div class="container">
<div class="box">
    <h1>My Reservation</h1>
    
    <?php

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            //for cancellation
            if(isset($_POST['cancel'])){
                $id = $_GET['criteria'];
                $cancelSql = "UPDATE tbl_reservation SET status = 'cancelled' WHERE res_id = $id";
                $stmtUpdate = mysqli_query($conn, $cancelSql);
                if($stmtUpdate){
                   echo('<h2>Cancellation Success</h2>');

                }else{
                    echo('<h2>Cancellation Failed</h2>');

                }
            }
            
            $username = $_SESSION['username'];

            $userId = 0;

            $sqlUserId = "SELECT id FROM tbl_users WHERE username = ?";
            $stmtUserId = $conn->prepare($sqlUserId);
        if (!$stmtUserId) {
            die("Error in preparing SQL query: " . $conn->error);
        }
        $stmtUserId->bind_param("s", $username);

        if (!$stmtUserId->execute()) {
            die("Error in executing SQL query: " . $stmtUserId->error);
        }

        $resultUserId = $stmtUserId->get_result();

            if ($resultUserId->num_rows === 1) {
                $rowUserId = $resultUserId->fetch_assoc();
                $userId = $rowUserId['id'];
            }

            $sqlReservation = "SELECT * FROM tbl_reservation WHERE userId = ?";
            $stmtReservation = $conn->prepare($sqlReservation);
            $stmtReservation->bind_param("i", $userId);
            $stmtReservation->execute();
            $resultReservation = $stmtReservation->get_result();

            if ($resultReservation->num_rows > 0) {
                while ($rowReservation = $resultReservation->fetch_assoc()) {
                    $package = $rowReservation['packageName']; 
                    $numDays = $rowReservation['numDays'];
                    $eventDate = $rowReservation['event_date'];
                    $cost = $rowReservation['totalcost'];
                    $reserveId = $rowReservation['res_id'];



                    //for user details
                    $sqlUserInfo = "SELECT name, email, phone FROM tbl_users WHERE id = ?";
                    $stmtUserInfo = $conn->prepare($sqlUserInfo);
                    $stmtUserInfo->bind_param("i", $userId);
                    $stmtUserInfo->execute();
                    $resultUserInfo = $stmtUserInfo->get_result();
                    if ($resultUserInfo->num_rows === 1){
                        $rowUserInfo = $resultUserInfo->fetch_assoc();
                        $name = $rowUserInfo['name'];
                        $email = $rowUserInfo['email'];
                        $phone = $rowUserInfo['phone'];
                        ?>
                        <div class="row">
                            <div class="col">
                                <h1>Reservation ID:</h1>
                                <span>#<?=$reserveId?></span>
                            </div>
                            <div class="col">
                                <h1>Service Name:</h1>
                                <span>Marriage</span>
                            </div>
                            <div class="col">
                                <h1>Package</h1>
                                <span><?=$package?></span>
                            </div>
                            <div class="col">
                                <h1>No. of Days</h1>
                                <span><?=$numDays?></span>
                            </div>
                            <div class="col">
                                <h1>Reserved Date</h1>
                                <span><?=$eventDate?></span>
                            </div>
                            <div class="col">
                                <h1>Total Cost:</h1>
                                <span><?=$cost?></span>
                            </div>
                            <div class="col-1">
                                <h1>Name: <span><?=$name?></span></h1>
                                <h1>Email: <span><?=$email?></span></h1>
                                <h1>Phone: <span><?=$phone?></span></h1>
                            </div>
                            <div class="btn" id="cancel">
                                <form action="reservation.php?criteria=<?=$rowReservation['res_id']?>" method="post">
                                    <input type="submit" class="cancel" name="cancel" value="Cancel Reservation">
                                </form>
                            </div>

                        </div>
                        <?php
                    }

                 
                   
                }

            }
        } 
        ?>

    
</div>
</div>

</body>


<?php
    require_once('footer.php');
?>
