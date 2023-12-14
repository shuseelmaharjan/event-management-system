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
<div class="messageBox" id="messageBox">
    <p id="displayMsg"></p>
    <p onclick="closemessageBox()" id="closeBtn"><i class="fa-solid fa-xmark"></i></p>
</div>
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
            
            <li class="sidebar-submenu">
                <a class="sidebar-menu-dropdown">
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
                        <a href="changepassword.php">
                            Change Password
                        </a>
                    </li>   
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a onclick="confirmLogout()">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var currentUrl = window.location.href;

        var menuItems = document.querySelectorAll(".sidebar-menu a");

        menuItems.forEach(function (menuItem) {
            var menuItemUrl = menuItem.getAttribute("href");
            
            if (currentUrl.indexOf(menuItemUrl) !== -1) {
                menuItem.classList.add("active");
            }
        });
    });

    function confirmLogout() {
        var confirmLogout = confirm("Are you sure you want to logout?");
        if (confirmLogout) {
            window.location.href = "logout.php";
        } 
    }

    </script>
  