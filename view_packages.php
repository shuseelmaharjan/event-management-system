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
            margin-top: 70px;
        }
        .container .col{
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;
        }
        .container .col h1{
            font-size: 3rem;
            color: #02266C;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .container .col img{
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .container .col h2{
            padding: 20px 0px 0px 0px;
            font-size: 1em;
        }
        .container .col p{
            font-size: 1rem;
            line-height: 1.5rem;
            padding: 10px 0px;
            text-align: justify;
        }
        .container .col .package h1{
            font-size: 1em;
        }
        .info ul{
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(2, 1fr);
            outline: none;
            background-color: #eee;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .info ul li{
            list-style: none;
            font-size: 1em;
            text-align: justify;
        }
        .info ul li span{
            font-weight: 600;
        }
        .info ul .des{
            grid-column: span 2;
        }
        .container .col form {
            padding: 20px 0px;
        }

        .container .col form .row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1ft;
            grid-gap: 30px;
        }

        .container .col form .row .box {
            display: block;
        }

        .container .col form .row .box label {
            display: block;
            font-size: 1em;
            margin: 15px 0px 10px 0px;
            font-weight: 600;
        }

        .container .col form .row .box select,
        .container .col form .row .box input[type="date"]{
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
        }
        .row .box span{
            margin-top: 10px;
            display: flex;
        }
        .row .box span p{
            font-size: 1.3em;
            font-weight: 600;
            padding-right: 5px;
        }

        .container .col form .row .btn {
            grid-column: 4;
        }
        .container .col form .row .btn input{
            padding: 15px 20px;
            width: 100%;
            background-color: #22a613;
            color: #fff;
            border: none;
            font-weight: 600;
            border-radius: 15px;
            cursor: pointer;
            font-size: 1.2em;
        }
        .days button{
            padding: 10px;
            width: 30%;
            background-color: #02266C;
            color: #fff;
            font-weight: 600;
            border-radius: 15px;
            border: none;
        }
        .days input{
            width: 30px;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
        }
        .days input::-webkit-outer-spin-button,
        .days input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        .alertMesage{
            width: 100%;
            margin: 30px 0px;
            display: none;
        }
        .alertMesage .box{
            background-color: green;
            display: flex;
            justify-content: space-between;
            padding: 0px 20px;
        }
        .alertMesage .box p{
            color: #fff;
        }


    </style>
    <?php

      
        $id = $_GET['criteria'];

        $sqlService = "SELECT s.ser_name, s.image, s.description, t.name AS event_type
                    FROM tbl_service s
                    LEFT JOIN tbl_types t ON s.type = t.type_id
                    WHERE s.ser_id = '$id'";
        $resultService = mysqli_query($conn, $sqlService);

        if (!$resultService) {
            echo "Connection error: " . mysqli_error($conn);
        } else {
            $serviceData = mysqli_fetch_assoc($resultService);
        }

        $sqlPackages = "SELECT p.pkg_name, p.pkg_cost, p.pkg_guest, p.pkg_description
                        FROM tbl_packages p
                        WHERE p.service_id = '$id'";
        $resultPackages = mysqli_query($conn, $sqlPackages);

        if (!$resultPackages) {
            echo "Connection error: " . mysqli_error($conn);
        }
        ?>

        <div class="container">
            <div class="col">
                <h1><?php echo $serviceData["ser_name"]; ?></h1>
                <img src="serviceUploads/<?php echo $serviceData["image"]; ?>" alt="image">
                <h2>Event Type: <?php echo $serviceData["event_type"]; ?></h2>
                <p><?php echo $serviceData['description']; ?></p>
                <h2>Our Best Packages</h2>
                <div class="package">
                    <?php
                    while ($packageData = mysqli_fetch_assoc($resultPackages)) {
                    ?>
                        <div class="info">
                            <h1><?php echo $packageData['pkg_name']; ?></h1>
                            <ul>
                                <li><span>Package Cost: </span><?php echo $packageData['pkg_cost']; ?></li>
                                <li><span>Package Limit Guests: </span><?php echo $packageData['pkg_guest']; ?></li>
                                <div class="des">
                                    <li><span>Package Description: </span><?php echo $packageData['pkg_description']; ?></li>
                                </div>
                                
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                   
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                          
                            $eventTypeId = $serviceData["ser_name"];
                            $totalCost = $_POST["totalCost"];
                            $serviceId = $serviceData["ser_name"]; 
                            $packageId = $_POST["packageName"];
                            $userId = $row['id'];
                            $reserveDate = date("Y-m-d");
                            $reserveTime = date("H:i:s"); 
                            $numDays = $_POST["numDays"];
                            $eventDate = $_POST["eventDate"];

                            $sqlInsert = "INSERT INTO tbl_reservation (eventType, serviceName, packageName, userId, reserveDate, reserveTime, totalcost, numDays, event_date)
                                        VALUES ('$eventTypeId', '$serviceId', '$packageId', '$userId', '$reserveDate', '$reserveTime', '$totalCost', '$numDays', '$eventDate')";

                            $result = mysqli_query($conn, $sqlInsert);
                            if ($result) {
                                echo '<script>';
                                echo 'window.location.href = "reservation.php";';
                                echo '</script>';
                            }
                            
                             else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        
                    }
                ?>

                <div class="alertMesage">
                    <div class="box">
                        <p id="message">test</p>
                        <p>X</p>
                    </div>
                </div>
                <form action="" method="POST">
                <div class="row">
                    <div class="box">
                        <div class="days">
                            <label for="numDays">Number of Days</label>
                            <button type="button" id="decrement"><i class="fa-solid fa-minus"></i></button>
                            <input type="number" id="value" name="numDays" value="1" min="1">
                            <button type="button" id="increment"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="box">
                        <label for="eventDate">Choose Date:</label>
                        <input type="date" name="eventDate" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <div class="box">
                        <label for="eventType">Select Package:</label>
                        <?php
                            $result = $conn->query($sqlPackages);

                            if ($result->num_rows > 0) {
                        ?>
                        <select name="packageName" id="type" onchange="updatePackagePrice()" required>
                            <option value="" selected disabled>Select Package</option>
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    $pkg_id = $row['pkg_id'];
                                    $pkgName = $row['pkg_name'];
                                    $pkgPrice = $row['pkg_cost'];
                            ?>
                            <option value="<?= $pkgPrice ?>" data-price="<?= $pkgPrice ?>"><?= $pkgName ?></option>
                            <?php }?>
                        </select>
                        <?php } else {
                            echo 'No data found.';
                        }
                        ?>
                    </div>

                    <div class="box">
                        <label for="cost">Cost:</label>
                        <input type="number" name="totalCost" id="costInput" hidden>
                        <span><p>NRP</p> <p id="packagePrice">00.00</p></span>
                    </div>

                    <div class="btn">
                        <input type="submit" name="proceed" value="Book Reservation">
                    </div>

                </div>
            </form>


            <script>
                // Get references to the elements
                var packagePriceElement = document.getElementById("packagePrice");
                var costInputElement = document.getElementById("costInput"); // Add this line

                function updatePackagePrice() {
                    var select = document.getElementById("type");
                    var selectedOption = select.options[select.selectedIndex];
                    var packagePrice = parseFloat(selectedOption.getAttribute("data-price"));
                    var numberOfDays = parseInt(document.getElementById("value").value);
                    var totalPrice = packagePrice * numberOfDays;

                    // Update both the "packagePrice" element and the input field
                    packagePriceElement.textContent = totalPrice.toFixed(2);
                    costInputElement.value = totalPrice.toFixed(2); // Set the input field value
                }

                const decrementButton = document.getElementById("decrement");
                const incrementButton = document.getElementById("increment");
                const valueInput = document.getElementById("value");

                decrementButton.addEventListener("click", function () {
                    let currentValue = parseInt(valueInput.value);

                    if (currentValue > 1) {
                        currentValue--;
                        valueInput.value = currentValue;
                        updatePackagePrice(); // Update the price when the value changes
                    }
                });

                incrementButton.addEventListener("click", function () {
                    let currentValue = parseInt(valueInput.value);

                    currentValue++;
                    valueInput.value = currentValue;
                    updatePackagePrice(); // Update the price when the value changes
                });
            </script>


                
            </div>
        </div>


</body>


<?php
    require_once('footer.php');
?>
