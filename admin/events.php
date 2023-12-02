<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
     #btns{
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="main">
        <div class="main-header">
            <div class="main-title">
                Events
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="btns" id="btns">
                        <div id="addBtn">
                            <a href="eventhistory.php">View History</a>
                        </div>
                        <div id="addBtn">
                            <a href="addevents.php">Add Event Post</a>
                        </div>
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
                                WHERE e.ad_status = 'active'
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
                                        <th class="left">Venue</th>
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
                                                <td class="left"><?php echo $row['venue']; ?></td>
                                                <td class="center">
                                                    <a href="viewevents.php?criteria=<?=$row['id'];?>" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i></span></a>
                                                    <a href="updateevent.php?criteria=<?=$row['id'];?>" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                                                    <a href="javascript:void(0);" class="delete" onclick="confirmDelete('events.php?criteria=<?=$row['id']?>')"><span><i class="fa-solid fa-trash"></i></span></a>
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
    function confirmDelete(redirectUrl) {
        var confirmation = confirm("Are you sure you want to delete this record?");

        if (confirmation) {
            // If confirmation is true, redirect to the server to handle the deletion
            window.location.href = redirectUrl;
        }
    }
</script>

<?php
if (isset($_GET['criteria'])) {
    $id = $_GET['criteria'];
    $deleteData = new event($conn);

    if ($deleteData->deleteEvent($id)) {
        // Successful deletion, you can redirect or display a success message
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "green";';
        echo 'document.getElementById("displayMsg").innerText = "Event program deleted successfully.";';
        echo 'setTimeout(function () { window.location.href = "events.php"; }, 3000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Error deleting the event program.";';
        echo '</script>';
    }
}



require_once('footer.php');
?> 