<?php
    require_once('php/connection.php');
    require_once('header.php');
    require_once('nav.php');

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

        $sqlPackages = "SELECT p.pkg_id, p.pkg_name, p.pkg_cost, p.pkg_guest, p.pkg_description
                        FROM tbl_packages p
                        WHERE p.service_id = '$id'";
        $resultPackages = mysqli_query($conn, $sqlPackages);

        if (!$resultPackages) {
            echo "Connection error: " . mysqli_error($conn);
        }
        ?>

        <div class="container">
            <div class="events-wrapper">


            <div class="content">
                <img src="serviceUploads/<?php echo $serviceData["image"]; ?>" alt="image">
                <div class="other-content">
                    <h1><?php echo $serviceData["ser_name"]; ?></h1>

                

                    <div class="info-content">
                        <h2>Event Type: <?php echo $serviceData["event_type"]; ?></h2>
                    </div>
                    <div class="des">
                        <p><?php echo $serviceData['description']; ?></p>
                    </div>
                    <div class="info-content">
                        <h1 style="text-align: center; text-transform: uppercase;">Our Best Packages</h1>
                        <div class="package-container">
                            <?php
                            while ($packageData = mysqli_fetch_assoc($resultPackages)) {
                            ?>
                                <div class="info">
                                    <h1><?php echo $packageData['pkg_name']; ?></h1>
                                    <ul>
                                        <li><span class="price"><h3>NRS. <?php echo $packageData['pkg_cost']; ?> /-</span></h3></li>
                                        <li><span><strong>Guest Limit:</strong></span><?php echo $packageData['pkg_guest']; ?></li>
                                        <li><span><strong>Description:</strong></span><?php echo $packageData['pkg_description']; ?></li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <span class="userMsg" style="color:red;"><p><i>* Once you book the reservation, you cannot cancel after an hour, so make sure to decide before you book for reservation.</i></p></span>

                </div>
                
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $userId = $row['id'];
                        $packageId = $_POST["packageName"];
                        $reserveDate = date("Y-m-d");
                        $reserveTime = date("H:i:s");
                        $totalCost = $_POST["totalCost"];
                        $numDays = isset($_POST["numDays"]) ? intval($_POST["numDays"]) : 1;
                        $eventDate = isset($_POST["eventDate"]) ? $_POST["eventDate"] : '';
                        $venue = $_POST["eventVenue"];

                        $sqlInsert = "INSERT INTO tbl_reservation (userId, packageId, reserveDate, reserveTime, totalcost, numDays, event_date, eventDestination)
                        VALUES ('$userId', '$packageId', '$reserveDate', '$reserveTime', '$totalCost', '$numDays', '$eventDate', '$venue')";

                        $result = mysqli_query($conn, $sqlInsert);

                        if ($result) {
                            echo '<script>window.location.href = "reservation.php";</script>';
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                ?>

                <div id="package-form">
                <form action="" method="POST">
                    <div class="package-row">
                        <div class="package-box">
                            <label for="numDays">Number of Days</label>
                            <div class="days">
                                <button style="background: #02266C;" type="button" id="decrement"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" class="numDays" id="value" name="numDays" value="1" min="1">
                                <button style="background: #02266C;" type="button" id="increment"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>

                        <div class="package-box">
                            <label for="eventDate">Choose Date:</label>
                            <input type="date" name="eventDate" min="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                        <div class="package-box">
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
                                <option value="<?= $pkg_id ?>" data-price="<?= $pkgPrice ?>"><?= $pkgName ?></option>
                                <?php }?>
                            </select>
                            <?php } else {
                                echo 'No data found.';
                            }
                            ?>
                        </div>

                        <div class="package-box">
                            <label for="eventVenue">Event Venue:</label>
                            <input type="text" name="eventVenue" required>
                        </div>

                        <div class="row-2">
                            <div class="package-box">
                                <label for="cost"><span class="pkg-price">Cost: NRP <p id="packagePrice"> 00.00 </p> /-</span></label>
                                <input type="number" name="totalCost" id="costInput" hidden>
                            </div>
                            <div class="btn">
                                <button style="background: #02266C;">Book Reservation</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
            </div>
        </div>


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


<?php
    require_once('footer.php');
?>
