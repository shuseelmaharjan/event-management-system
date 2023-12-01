<?php
require_once('header.php');
require_once('sidebar.php');
?>
<?php
if(isset($_GET['criteria'])){
    $criteria = $_GET['criteria'];
    $sql = "DELETE from tbl_mail where id = $criteria";
    $stmt = mysqli_query($conn, $sql);
}
?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Messages
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    
                    <div class="box">
                        <div class="box-header">
                            All Messages
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">S.N.</th>
                                        <th class="left">Mail By</th>
                                        <th class="center">Date</th>
                                        <th class="center">Time</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    $recordsPerPage = 10;

                                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                        $currentPage = $_GET['page'];
                                    } else {
                                        $currentPage = 1;
                                    }

                                    $offset = ($currentPage - 1) * $recordsPerPage;

                                    $sqlCount = "SELECT COUNT(*) as total FROM tbl_mail";
                                    $resultCount = mysqli_query($conn, $sqlCount);
                                    $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                                    $totalPages = ceil($totalRecords / $recordsPerPage);
                                ?>

                                <tbody>
                                    <?php
                                    $sql = "SELECT * 
                                    FROM tbl_mail 
                                    ORDER BY publish_date DESC, STR_TO_DATE(publish_time, '%H:%i:%s') DESC
                                    LIMIT $offset, $recordsPerPage;
                                    ";
                                    $result = $conn->query($sql);
                                    if (!$result) {
                                        die("Query failed: " . $conn->error);
                                    }
                                    
                                    $serialNumber = ($currentPage - 1) * $recordsPerPage + 1;
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="center"><?=$serialNumber?></td>
                                            <td class="left"><?=$row['name']?></td>
                                            <td class="center"><?=$row['publish_date']?></td>
                                            <td class="center"><?=$row['publish_time']?></td>
                                            <td class="center">
                                                <a href="view-messages.php?criteria=<?=$row['id']?>" class="edit" onclick="editBtn()"><span>View Message</span></a>

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

<?php
require_once('footer.php');
?>