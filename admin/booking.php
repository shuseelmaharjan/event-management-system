<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
    table tbody{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5px 30px;

    }
    table tr{
        width: 100%;
    }
    table tr td{
        width: 100%;
        border-bottom: none;
    }
    table tr td h1{
        font-size: 18px;
        font-weight: 600;

    }
    table tr td span{
        font-weight: 400;
    }
    .box-body form{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px 20px;
    }
    .box form .input-box label {
        font-size: 1rem;
        font-weight: 600;
        display: block;
        margin: 10px 0px;
    }
    .box form .input-box input,
    .box form .input-box select{
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
    }
    #update{
        grid-column: 3;
    }
    #update input{
        background-color: green;
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        padding: 10px 0px;
        width: 100px;
        float: right;
    }
    .box table tbody tr{
        padding: 0;
        margin: 0;
    }
    .box table tbody tr td{
        padding: 0;
        margin: 0;
    }
    .box table tbody tr h1 span{
        margin-left: 5px;
    }
    .box table tbody tr h1{
        font-size: 1rem;
        color: #000;
        display: flex;
    }
</style>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Booking Details
            </div>
            <div class="last-title">
                <div class="user-details">
                <img src="../profile/uploads/default.png" width="50px" alt="image">
                <h1>User Admin</h1>
                </div>
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
            <div class="col-12">
                    <a href="request.php">
                        <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                        </div>
                    </a>
                    <!-- ORDERS TABLE -->
                    <?php
                            $id = $_GET['criteria'];

                            $sql = "SELECT r.*, u.name AS user_name, u.email AS user_email, u.phone AS user_phone
                                    FROM tbl_reservation r
                                    JOIN tbl_users u ON r.userId = u.id
                                    WHERE r.res_id = $id;
                            ";
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("Query failed: " . $conn->error);
                            }
                            while ($row = $result->fetch_assoc()){
                                ?>
                    <div class="box">
                        <div class="box-header">
                            User Details
                        </div>
                        <div class="box-body overflow-scroll">
                            
                                <table>
                                    <tbody>

                                        <tr>
                                            <td><h1>Booked By: <span><?=$row['user_name'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                        <td><h1>User Phone: <span><?=$row['user_phone'];?></span></h1></td>

                                        </tr>
                                        <tr>
                                            <td><h1>Email: <span><?=$row['user_email'];?></span></h1></td>
                                        </tr>
                                    </tbody>
                                </table>
                              
                            
                           
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            Reservation Description
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <tbody>
                                        <tr>
                                            <td><h1>Service Name: <span><?=$row['serviceName'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Package Name: <span><?=$row['packageName'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Event Type: <span><?=$row['eventType'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Event Destination: <span><?=$row['eventDestination']?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Event Date: <span><?=$row['event_date'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Reservation Date: <span><?=$row['reserveDate'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Total Cost: <span><?=$row['totalcost'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Paid Amount: <span><?=$row['advanceamt'];?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $dueAmt = $row['totalcost'] - $row['advanceamt'];
                                            ?>
                                            <td><h1>Due Amount: <span><?= $dueAmt ?></span></h1></td>
                                        </tr>
                                        <tr>
                                            <td><h1>Reservation ID: <span>#<?=$row['res_id'];?></span></h1></td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            Response
                        </div>
                        <div class="box-body overflow-scroll">
                        <?php
                            if (isset($_POST['updatedata'])) {
                                $workStatus = $_POST['status'];
                                $paymentStatus = $_POST['pstatus'];
                                $payment = $_POST['payment'];


                                $updateSql = "UPDATE tbl_reservation SET status = ?, amtstatus = ?, advanceamt = ? WHERE res_id = ?";

                                $stmt = mysqli_prepare($conn, $updateSql);

                                if ($stmt) {
                                    mysqli_stmt_bind_param($stmt, "sssi", $workStatus, $paymentStatus, $payment, $id);

                                    $result = mysqli_stmt_execute($stmt);

                                    if (!$result) {
                                        echo "Update failed: " . mysqli_error($conn);
                                    } else {
                                        echo'<script>';
                                        echo'window.location.href = "http://localhost/eveproject/admin/request.php";';
                                        echo'</script>';
                                    }

                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo "Error in preparing the SQL statement: " . mysqli_error($conn);
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="input-box" id="block">
                                    <label for="status">Work Status:</label>
                                    <select name="status" id="status">
                                        <option value="" selected disabled>Update Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="onwork">On Work</option>
                                        <option value="cancelled">Cancelled</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label for="pstatus">Payment Status:</label>
                                    <select name="pstatus" id="pstatus">
                                        <option value="" selected disabled>Update Payment Status</option>
                                        <option value="paid">Paid</option>
                                        <option value="due">Due</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label for="payment">Payment Amount:</label>
                                    <input type="number" name="payment" placeholder="Payment Amount">
                                </div>
                                <div class="input-box" id="update">
                                    <input type="submit" name="updatedata" value="Update">
                                </div>
                            </form>

                        </div>
                    </div>
                    <?php
                            }
                           ?>
                           
                    
                </div>
            </div>
        </div>
</div>

<?php
require_once('footer.php');
?>