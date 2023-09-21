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
                Services
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Recent Events
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Organizers</th>
                                        <th>Venue</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Payment status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2345</td>
                                        <td>
                                            <div class="order-owner">
                                                <span>tuat tran anh</span>
                                            </div>
                                        </td>
                                        <td>Lazimpath</td>
                                        <td>2021-05-09</td>
                                        <td>Concert</td>
                                        <td>
                                            <div class="payment-status payment-pending">
                                                <div class="dot"></div>
                                                <span>Pending</span>
                                            </div>
                                        </td>
                                        <td><a href="#">View Details</a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END ORDERS TABLE -->
                </div>
            </div>
        </div>
  
</div>

<?php
require_once('footer.php');
?>