<?php
require_once('header.php');
require_once('sidebar.php');
?>
<div class="main">
    <div class="main-header">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu-alt-right'></i>
        </div>
        <div class="main-title">
            Billing History
        </div>
        <?php 
        require_once('profile.php');
        ?>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
            <a href="billing.php">
                        <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                        </div>
                    </a>
                <!-- ORDERS TABLE -->
                <div class="box">
                    <div class="box-header">
                        Paid History
                    </div>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th class="center">S.N.</th>
                                    <th class="left">Name</th>
                                    <th class="left">Package Name</th>
                                    <th class="left">Service Name</th>
                                    <th class="center">Advance Amount</th>
                                    <th class="center">Due Amount</th>
                                    <th class="center">Event Date</th>
                                    <th class="center">Event Destination</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $recordsPerPage = 10;  // Or any other value you want to set

                                // Initialize $currentPage before using it
                                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                    $currentPage = $_GET['page'];
                                } else {
                                    $currentPage = 1;
                                }

                                $offset = ($currentPage - 1) * $recordsPerPage;

                                $sql = "SELECT
                                            r.res_id,
                                            u.name AS user_name,
                                            p.pkg_name AS package_name,
                                            s.ser_name AS service_name,
                                            r.advanceamt,
                                            (r.totalcost - r.advanceamt) AS due_amount,
                                            r.event_date,
                                            r.eventDestination
                                        FROM
                                            tbl_reservation r
                                        JOIN tbl_users u ON r.userId = u.id
                                        JOIN tbl_packages p ON r.packageId = p.pkg_id  -- Ensure this matches your actual column name
                                        JOIN tbl_service s ON p.service_id = s.ser_id
                                        JOIN tbl_types t ON s.type = t.type_id
                                        WHERE
                                            r.amtstatus != 'due'
                                        ORDER BY
                                            r.reserveDate DESC
                                        LIMIT $offset, $recordsPerPage;";

                                $result = $conn->query($sql);
                                if (!$result) {
                                    die("Query failed: " . $conn->error);
                                }

                                $serialNumber = ($currentPage - 1) * $recordsPerPage + 1;
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr class="status-row">
                                        <td class="center"><?php echo ($serialNumber); ?></td>
                                        <td class="left"><?php echo ($row['user_name']); ?></td>
                                        <td class="left"><?php echo ($row['package_name']); ?></td>
                                        <td class="left"><?php echo ($row['service_name']); ?></td>
                                        <td class="center"><?php echo ($row['advanceamt']); ?></td>
                                        <td class="center"><?php echo ($row['due_amount']); ?></td>
                                        <td class="center"><?php echo ($row['event_date']); ?></td>
                                        <td class="center"><?php echo ($row['eventDestination']); ?></td>
                                        <td class="center">
                                            <a href="booking.php?criteria=<?= $row['res_id'] ?>" class="edit">View Details</a>
                                        </td>
                                    </tr>
                                <?php
                                    $serialNumber++;
                                }
                                $result->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination">
                    <?php
                    $sqlCount = "SELECT COUNT(*) as total FROM tbl_reservation";
                    $resultCount = mysqli_query($conn, $sqlCount);
                    $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                    $totalPages = ceil($totalRecords / $recordsPerPage);
                    ?>
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?php echo ($currentPage - 1); ?>"><i class="fa-solid fa-angles-left"></i> Previous</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?php echo ($currentPage + 1); ?>">Next <i class="fa-solid fa-angles-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>
