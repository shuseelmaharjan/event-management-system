<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
    .status{
        color: #fff;
        border-radius: 50px;
        padding: 5px 10px;
        font-weight: 600;
        text-transform: capitalize;
    }
</style>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Requests
            </div>
            <div class="last-title">
                <div class="user-details">
                <img src="images/default-1.png" width="50px" alt="image">
                <h1>User Admin</h1>
                </div>
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Request Events
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">S.N.</th>
                                        <th class="left">Request By</th>
                                        <th class="left">Service Name</th>
                                        <th class="left">Package</th>
                                        <th class="center">Event Date</th>
                                        <th class="center">Request Date</th>
                                        <th class="center">Status</th>
                                        <th class="center">Action</th>
                                    </tr>
                                    <?php
                                    $recordsPerPage = 10;

                                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                        $currentPage = $_GET['page'];
                                    } else {
                                        $currentPage = 1;
                                    }

                                    $offset = ($currentPage - 1) * $recordsPerPage;

                                    $sqlCount = "SELECT COUNT(*) as total FROM tbl_reservation";
                                    $resultCount = mysqli_query($conn, $sqlCount);
                                    $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                                    $totalPages = ceil($totalRecords / $recordsPerPage);
                                ?>

                                <tbody>
                                    <?php
                                    $sql = "SELECT r.*, u.name AS user_name, u.email AS user_email, u.phone AS user_phone
                                            FROM tbl_reservation r
                                            JOIN tbl_users u ON r.userId = u.id
                                            ORDER BY r.reserveDate DESC
                                            LIMIT $offset, $recordsPerPage;
                                            ";
                                    $result = $conn->query($sql);
                                    if (!$result) {
                                        die("Query failed: " . $conn->error);
                                    }
                                    
                                    $serialNumber = ($currentPage - 1) * $recordsPerPage + 1;
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr class="status-row">
                                        
                                            <td class="center"><?php echo($serialNumber); ?></td>
                                            <td class="left"><?php echo($row['user_name']); ?></td>
                                            <td class="left"><?php echo($row['serviceName']); ?></td>
                                            <td class="left"><?php echo($row['packageName']); ?></td>
                                            <td class="center"><?php echo($row['event_date']); ?></td>
                                            <td class="center"><?php echo($row['reserveDate']); ?></td>
                                            <td class="center"><span class="status"><?= empty($row['status']) ? 'Not Seen' : $row['status'] ?></span></td>
                                            <td class="center">
                                                <a href="booking.php?criteria=<?=$row['res_id']?>" class="edit">View Details</a>
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
<script>
    const statusRows = document.querySelectorAll('.status-row');

    statusRows.forEach(row => {
        const statusCell = row.querySelector('.status');
        const status = statusCell.textContent.trim();

        switch (status) {
            case 'completed':
                statusCell.style.backgroundColor = '#22a613';
                break;
            case 'pending':
            case 'onwork':
                statusCell.style.backgroundColor = '#1177aa';
                break;
            case 'cancelled':
                statusCell.style.backgroundColor = '#b90f0f';
                break;
            default:
                statusCell.style.backgroundColor = '#f8d7da';
                statusCell.style.color = '#000';
                break;
        }
    });
</script>

<?php
require_once('footer.php');
?>