<?php
require_once('header.php');
require_once('sidebar.php');


$deleteData = new event($conn);
if(isset($_GET['criteria'])){
    $id = $_GET['criteria'];

    if($deleteData->deleteEvent($id)){
        exit();
    }else{
        echo"Deletion failed";
    }
}
?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Events
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
                    <!-- ORDERS TABLE -->
                    <div id="addBtn">
                        <a href="addevents.php">Add Event Post</a>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            All Events
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
                                        <th class="center">Action</th>
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
                                                <td class="center">
                                                    <a href="#" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i></span></a>
                                                    <a href="updateevent.php?criteria=<?=$row['id'];?>" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                                                    <a href="events.php?criteria=<?= $row['id']; ?>" onclick="confirm('Are yuu sure');" class="delete"><span><i class="fa-solid fa-trash"></i></span></a>
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

<?php
require_once('footer.php');
?> 