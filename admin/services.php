<?php
require_once('header.php');
require_once('sidebar.php');

?>
<style>
    #btns{
        display: flex;
        justify-content: flex-end;
    }
    #view{
        background-color: none;
        padding: 10px;
        right: 0;    
        display: flex;
        justify-content: flex-end;
    }
    #view a{
        background-color: #22a613;
        color: var(--body-bg);
        font-weight: 600;
        padding: 10px 15px;
        border-radius: 10px;
    }
</style>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Services
            </div>
            <?php require_once('profile.php');?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="btns" id="btns">
                        <div id="view" >
                            <a href="viewpackages.php">View Packages Lists</a>
                        </div>
                        <div id="addBtn">
                            <a href="addpackages.php">Add Packages</a>
                        </div>
                        <div id="addBtn">
                            <a href="addservices.php">Add Services</a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            All Services
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

                            $sqlCount = "SELECT COUNT(*) as total FROM tbl_service";
                            $resultCount = mysqli_query($conn, $sqlCount);
                            $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                            $totalPages = ceil($totalRecords / $recordsPerPage);

                            // $sql = "SELECT e.*, t.ser_name AS name
                            //         FROM tbl_service AS e
                            //         LEFT JOIN tbl_types AS t ON e.eventType = t.type_id
                            //         LIMIT $offset, $recordsPerPage";
                            // $sql = "SELECT * FROM tbl_service";
                            $sql = "SELECT s.ser_id, s.ser_name, t.name AS type_name, 
                                    (SELECT COUNT(*) FROM tbl_packages p WHERE p.service_id = s.ser_id) AS total_packages
                                    FROM tbl_service s
                                    INNER JOIN tbl_types t ON s.type = t.type_id
                                    LIMIT $offset, $recordsPerPage;";
                            $result = mysqli_query($conn, $sql);


                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th class="left">Service Name</th>
                                        <th class="center">Number of Packages</th>
                                        <th class="center">Event Type</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // var_dump($result);
                                    $serialNumber = $offset + 1;

                                    if ($result !== false) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <tr>
                                        <td class="center"><?php echo $serialNumber;?></td>
                                        <td class="left"><?php echo $row['ser_name'];?></td>
                                        <td class="center"><?php echo $row['total_packages']; ?></td>
                                        <td class="center"><?php echo $row['type_name']; ?></td>
                                        <td class="center">
                                            <a href="view-service.php?criteria=<?=$row['ser_id']?>" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i></span></a>
                                            <a href="editservice.php?criteria=<?=$row['ser_id']?>" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                                            <a href="javascript:void(0);" class="delete" onclick="confirmDelete('services.php?criteria=<?=$row['ser_id']?>')"><span><i class="fa-solid fa-trash"></i></span></a>     
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
    function confirmDelete(redirectUrl) {
        var confirmation = confirm("Are you sure you want to delete this record?");

        if (confirmation) {
            window.location.href = redirectUrl;
        }
    }
</script>
<?php
if (isset($_GET['criteria'])) {
    $id = $_GET['criteria'];
    require_once('php/authentication.php');
    $deleteData = new service($conn);

    // Debug statement
    echo "Debug: Before deleteService call. ID: $id<br>";

    if ($deleteData->deleteService($id)) {
        // Debug statement
        echo "Debug: Service deleted successfully.<br>";

        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "green";';
        echo 'document.getElementById("displayMsg").innerText = "Service deleted successfully.";';
        echo 'setTimeout(function () { window.location.href = "services.php"; }, 3000);';
        echo '</script>';
    } else {
        // Debug statement
        echo "Debug: Error deleting the service.<br>";

        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Error deleting the service.";';
        echo '</script>';
    }
}


require_once('footer.php');
?>