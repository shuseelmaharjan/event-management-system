
    <?php
        require_once('header.php');
        require_once('sidebar.php');

    ?>
   

    <div class="main">
        <div class="main-header">
           
            <div class="main-title">
                Dashboard
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title">
                                Total Users
                            </div>
                            <?php
                            $sql = "SELECT COUNT(*) AS total_users FROM tbl_users";
                            $result = mysqli_query($conn, $sql);
                            
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $totalUsers = $row['total_users'];
                            } else {
                                $totalUsers = 0; 
                            }
                            ?>
                             <div class="counter-info">
                                <div class="counter-count">
                                    <?php echo $totalUsers; ?>
                                </div>
                                <i class='bx bx-shopping-bag'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title">
                                Total Services
                            </div>
                            <?php
                              $sql = "SELECT COUNT(*) AS total_service FROM tbl_service";
                              $result = mysqli_query($conn, $sql);
                              
                              if ($result) {
                                  $row = mysqli_fetch_assoc($result);
                                  $totalService = $row['total_service'];
                              } else {
                                  $totalService = 0; 
                              }
                              ?>
                            <div class="counter-info">
                                <div class="counter-count">
                                <?php echo $totalService; ?>
                                </div>
                                <i class='bx bx-chat'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title">
                                Reqests
                            </div>
                            <?php
                                $sql = "SELECT COUNT(*) AS not_seen_requests FROM tbl_reservation WHERE status IS NULL OR status = ''";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $notSeenRequests = $row['not_seen_requests'];
                                } else {
                                    $notSeenRequests = 0; 
                                }
                            ?>
                            <div class="counter-info">
                                <div class="counter-count">
                                    <?php echo $notSeenRequests; ?>
                                </div>
                                <i class='bx bx-line-chart'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->
                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="box box-hover">
                        <!-- COUNTER -->
                        <div class="counter">
                            <div class="counter-title">
                                Completed Works
                            </div>
                            <?php
                                $sql = "SELECT COUNT(*) AS completedWork FROM tbl_reservation WHERE status = 'completed'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $completedWork = $row['completedWork'];
                                } else {
                                    $completedWork = 0; 
                                }
                            ?>
                            <div class="counter-info">
                                <div class="counter-count">
                                <?php echo $completedWork; ?>
                                </div>
                                <i class='bx bx-user'></i>
                            </div>
                        </div>
                        <!-- END COUNTER -->

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            Recent Requests
                        </div>
                        <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th class="center">S.N.</th>
                                    <th class="left">Event Name</th>
                                    <th class="center">Request Date</th>
                                    <th class="left">Event Type</th>
                                    <th class="center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT 
                                            r.res_id, 
                                            s.ser_name AS event_name, 
                                            r.reserveDate, 
                                            t.name AS event_type, 
                                            r.status
                                        FROM 
                                            tbl_reservation r
                                        JOIN 
                                            tbl_packages p ON r.packageId = p.pkg_id
                                        JOIN 
                                            tbl_service s ON p.service_id = s.ser_id
                                        JOIN 
                                            tbl_types t ON s.type = t.type_id
                                        WHERE 
                                            r.status = ''
                                        ORDER BY 
                                            r.reserveDate DESC
                                        LIMIT 
                                            5;";

                                $output = mysqli_query($conn, $sql);

                                if (!$output) {
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                    $serialNumber = 1;
                                    $rowCount = 0;

                                    while ($row = mysqli_fetch_assoc($output)) {
                                        ?>
                                        <tr>
                                            <td class="center"><?= $serialNumber ?></td>
                                            <td class="left"><?= $row['event_name'] ?></td>
                                            <td class="center"><?= $row['reserveDate'] ?></td>
                                            <td class="left"><?= $row['event_type'] ?></td>
                                            <td class="center">
                                                <a href="booking.php?criteria=<?= $row['res_id'] ?>" class="edit">View Details</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $rowCount++;
                                        $serialNumber++;
                                    }

                                    if (mysqli_num_rows($output) > 5) {
                                        echo '<tr><td colspan="5" class="center"><a href="allrequests.php" class="view">View All Requests</a></td></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>



                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  

<?php
require_once('footer.php');
?>