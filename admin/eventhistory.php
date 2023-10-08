<?php
require_once('header.php');
require_once('sidebar.php');
?>

<div class="main">
        <div class="main-header">
            <div class="main-title">
                Event History
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
                <a href="events.php">
                        <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                        </div>
                    </a>
                    
                    <div class="box">
                        <div class="box-header">
                            All Expired Ads
                        </div>
                        <div class="box-body overflow-scroll">
                        <?php
                            $recordsPerPage = 10;

                            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                $currentPage = $_GET['page'];
                            } else {
                                $currentPage = 1;
                            }

                            $offset = ($currentPage - 1) * $recordsPerPage;

                            $sqlCount = "SELECT COUNT(*) as total FROM tbl_events";
                            $resultCount = mysqli_query($conn, $sqlCount);
                            $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                            $totalPages = ceil($totalRecords / $recordsPerPage);
                            $sql = "SELECT e.*, t.name AS name
                                FROM tbl_events AS e
                                LEFT JOIN tbl_types AS t ON e.eventType = t.type_id
                                WHERE e.ad_status = 'expired'
                                ORDER BY e.adPostedDate DESC, e.adPostedTime DESC
                                LIMIT $offset, $recordsPerPage";


                            $result = mysqli_query($conn, $sql);
                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th class="left">Title</th>
                                        <th class="center">Event Start on</th>
                                        <th class="center">Type</th>
                                        <th class="center">Venue</th>
                                        <th class="center">Expired Date</th>
                                        <th class="center">Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    $serialNumber = $offset + 1;

                                    if ($result !== false) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $serialNumber; ?>.</td>
                                                <td class="left"><?php echo $row['eventName']; ?></td>
                                                <td class="center"><?php echo $row['dateofStart']; ?></td>
                                                <td class="center"><?php echo $row['name']; ?></td>
                                                <td class="center"><?php echo $row['venue']; ?></td>
                                                <td class="center"><?=$row['ad_expired_date']?></td>
                                                <td class="center">
                                                    <a href="viewevents.php?criteria=<?=$row['id'];?>" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $serialNumber++; 
                                        }
                                    }
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
    var currentPage = window.location.href;

    var eventsLink = document.querySelector('a[href="events.php"]');

    if (currentPage.includes("eventhistory.php")) {
        eventsLink.classList.add("active");
    }
</script>

<?php
require_once('footer.php');
?> 