<?php
require_once('php/connection.php');
require_once('header.php');
require_once('nav.php');
?>

<div class="container" style="background: #ccc;">
    <div class="reservation">
        <div class="res-title">
            <h1>My Reservations</h1>
        </div>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $username = $_SESSION['username'];

    // Use prepared statements to prevent SQL injection
    $sqlUserId = "SELECT id FROM tbl_users WHERE username = ?";
    $stmtUserId = $conn->prepare($sqlUserId);
    $stmtUserId->bind_param("s", $username);

    if (!$stmtUserId->execute()) {
        echo "Error: " . $stmtUserId->error;
    } else {
        $resultUserId = $stmtUserId->get_result();

        if ($resultUserId->num_rows === 1) {
            $rowUserId = $resultUserId->fetch_assoc();
            $user_id = $rowUserId['id'];
        }

        $sql = "SELECT r.res_id, r.packageId, r.reserveDate, r.reserveTime, r.status, r.totalcost, r.advanceamt, r.numDays, r.event_date, r.amtstatus, r.eventDestination,
                   u.name AS userName, u.email AS userEmail, u.phone AS userPhone,
                   p.pkg_name AS packageName,
                   s.ser_name AS serviceName
            FROM tbl_reservation r
            INNER JOIN tbl_users u ON r.userId = u.id
            INNER JOIN tbl_packages p ON r.packageId = p.pkg_id
            INNER JOIN tbl_service s ON p.service_id = s.ser_id
            WHERE r.userId = ? 
            ORDER BY r.res_id DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        } else {
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
?>
        <div class="box-container">
            <div class="box-row">
                <h1>Reservation Id</h1>
                <p>#<?= $row['res_id'] ?></p>
            </div>
            <div class="box-row">
                <h1>Service Name</h1>
                <p><?= $row['serviceName'] ?></p>
            </div>
            <div class="box-row">
                <h1>Package Name</h1>
                <p><?= $row['packageName'] ?></p>
            </div>
            <div class="box-row">
                <h1>Total Cost</h1>
                <p>NRs. <?= $row['totalcost'] ?></p>
            </div>
            <div class="box-row">
                <h1>Date of Reservation</h1>
                <p><?= $row['reserveDate'] ?></p>
            </div>
            <div class="box-row">
                <h1>Time</h1>
                <p><?= $row['reserveTime'] ?></p>
            </div>
            <div class="box-row">
                <h1>Event Venue</h1>
                <p><?= $row['eventDestination'] ?></p>
            </div>
            <div class="box-row">
                <h1>Event Days</h1>
                <p><?= $row['numDays'] ?></p>
            </div>
            <div class="box-row">
                <h1>Advance Amount</h1>
                <p><?= $row['advanceamt'] ?></p>
            </div>
            <div class="box-row">
                <h1>Due Amount</h1>
                <p>NRs. <?= $row['totalcost'] - $row['advanceamt']?></p>
            </div>
            <h2 style="grid-column: span 5;">User Details</h2>
            <div class="user-row" style="grid-column: span 5;">
                <div class="user-info">
                    <h1>Name: <?= $row['userName'] ?></h1>
                </div>
                <div class="user-info">
                    <h1>Email: <?= $row['userEmail'] ?></h1>
                </div>
                <div class="user-info">
                    <h1>Phone: <?= $row['userPhone'] ?></h1>
                </div>
            </div>
            <div class="user-row" style="grid-column: span 5">
            <div class="user-info">
                <h1>Request Status: <span id="status"><?= !empty($row['status']) ? $row['status'] : 'Pending' ?></span></h1>
            </div>

                <?php
                if ($row['status'] == "Active") {
                ?>
                    <button style="background-color: red; color:#fff; border:none; padding: 10px 15px; font-size: 1rem; font-weight: 500; cursor:pointer">Cancel Request</button>
                <?php
                }
                ?>
            </div>
        </div>
 

<?php
}
}
}
}?>
</div>
</div>
<?php
    require_once('footer.php');
?>
