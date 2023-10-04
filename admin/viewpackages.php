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
                View Packages
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
                    <div class="breadcum">
                        <a href="services.php">Services</a> > <a href="viewpackages.php">View Packages</a>
                    </div>
                    
                    <div class="box">
                        <div class="box-header">
                            All Packages lists
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

                            $sqlCount = "SELECT COUNT(*) as total FROM tbl_packages";
                            $resultCount = mysqli_query($conn, $sqlCount);
                            $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                            $totalPages = ceil($totalRecords / $recordsPerPage);

                            $sql = "SELECT p.pkg_id, p.pkg_name, p.pkg_cost, p.pkg_guest, p.pkg_description, s.ser_name AS service_name
                                    FROM tbl_packages AS p
                                    JOIN tbl_service AS s ON p.service_id = s.ser_id
                                    LIMIT $offset, $recordsPerPage;";

                            $result = mysqli_query($conn, $sql);


                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th class="left">Package Name</th>
                                        <th class="center">Package Cost</th>
                                        <th class="center">Number of Guests</th>
                                        <th class="center">Package of</th>
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
                                            <td class="center"><?php echo $serialNumber;?></td>
                                            <td class="left"><?php echo $row['pkg_name'];?></td>
                                            <td class="center"><?php echo $row['pkg_cost']; ?></td>
                                            <td class="center"><?php echo $row['pkg_guest']; ?></td>
                                            <td class="center"><?php echo $row['service_name']; ?></td>
                                            <td class="center">
                                                <a href="#" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i> View Description</span></a>
                                                <a href="#" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i> Edit</span></a>
                                                <a href="#" onclick="confirm('Are you sure');" class="delete"><span><i class="fa-solid fa-trash"></i> Delete</span></a>
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
                    
                    <!-- END ORDERS TABLE -->
                </div>
            </div>
        </div>
  
</div>

<?php
require_once('footer.php');
?>