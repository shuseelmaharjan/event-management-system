<?php
require_once('php/connection.php');


if (isset($_POST['cancel'])) {
    $id = $_GET['criteria'];

    $sql = "UPDATE tbl_reservation SET status = 'cancelled' WHERE res_id = $id";

    if (mysqli_query($conn, $sql)) {
        header('location: reservation.php');
        exit();
    } else {
        // Handle cancellation failure, display an error message, etc.
        echo "Cancellation failed: " . mysqli_error($conn);
    }
} else {
    echo"failed";
}
// ?>
