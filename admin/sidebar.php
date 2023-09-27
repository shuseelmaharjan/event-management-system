<?php
require_once('../php/connection.php');
require_once('php/authentication.php');

$userAuth = new UserAuthentication($conn);
$userAuth->validateUserLogin();

if($userAuth->isUserLoggedIn()){
    $userInfo = $userAuth->getUserInfo();
}else{
    echo("Login First");
    header("Location: login.php");
}
?>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="../images/logo-white.webp" alt="logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
       

        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu" id="menu">
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="events.php">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Events</span>
                </a>
            </li>
            <li>
                <a href="services.php">
                    <i class="fa-solid fa-server"></i>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="blog.php">
                    <i class="fa-solid fa-blog"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li>
                <a href="eventype.php">
                    <i class="fa-solid fa-tags"></i>
                    <span>Event Type</span>
                </a>
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
    <script>
        // JavaScript (script.js)
document.addEventListener("DOMContentLoaded", function () {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Get all the menu items
    var menuItems = document.querySelectorAll(".sidebar-menu a");

    // Iterate through menu items and add "active" class to the matching one
    menuItems.forEach(function (menuItem) {
        var menuItemUrl = menuItem.getAttribute("href");
        
        // Check if the current URL contains the menu item's URL
        if (currentUrl.indexOf(menuItemUrl) !== -1) {
            menuItem.classList.add("active");
        }
    });
});

    </script>
  