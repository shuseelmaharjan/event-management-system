<?php
require_once('../php/connection.php');
require_once('php/authentication.php');

if (User::isLoggedIn()) {
    // The user is logged in
} else {
    // The user is not logged in
    echo("login first");
}

?>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="../images/logo.webp" alt="logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <img src="./images/user-image.jpg" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    Admin
                </div>
            </div>
        </div>

        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu" id="menu">
            <li>
                <a href="index.php" class="active">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="" class="sidebar-menu-dropdown">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Events</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="events.php">
                            List
                        </a>
                    </li>
                    <li>
                        <a href="addevents.php">
                            Add Event
                        </a>
                    </li>     
                </ul>
            </li>

            <li class="sidebar-submenu">
                <a href="" class="sidebar-menu-dropdown">
                    <i class="fa-solid fa-server"></i>
                    <span>Services</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="services.php">
                            List
                        </a>
                    </li>
                    <li>
                        <a href="addservices.php">
                            Add Service
                        </a>
                    </li>     
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="" class="sidebar-menu-dropdown">
                    <i class="fa-solid fa-blog"></i>
                    <span>Blog</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="blog.php">
                            List
                        </a>
                    </li>
                    <li>
                        <a href="addblog.php">
                            Add Post
                        </a>
                    </li>     
                </ul>
            </li>
            <li>
                <a href="booking.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Booking</span>
                </a>
            </li>
            <li>
                <a href="billing.php">
                    <i class="fa-solid fa-money-check"></i>
                    <span>Billing</span>
                </a>
            </li>
            <li>
                <a href="request.php">
                <i class="fa-solid fa-code-pull-request"></i>
                    <span>Requests</span>
                </a>
            </li>
            <li>
                <a href="messages.php">
                    <i class="fa-solid fa-message"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li>
                <a href="settings.php">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class="fa-solid fa-user"></i>
                    <span>account</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="editprofile.php">
                            edit profile
                        </a>
                    </li>
                    <li>
                        <a href="accountSettings.php">
                            account settings
                        </a>
                    </li>     
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
