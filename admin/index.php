<?php
require_once('../php/connection.php');
// Start session
session_start();

// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <!--google icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


</head>
<body>
    <div class="grid-container">
        
        <!--start of header-->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined" onclick="accountToggle()">account_circle</span>
                <div class="account" id="account">
                    <div class="popupAccount">
                        <ul>
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li onclick="logOut()"><a href="logout.php">Log Out</a></li>
                        </ul>
                        
                    </div>
                </div>
            
                
            </div>
            
            

        </header>
        <!--end of header-->

        <!--Start of sidebar-->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <img src="../images/logo-white.webp" width="150px" alt="logo">
                </div>
                <div class="material-icons-outlined" onclick="closeSidebar()">close</div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item"> <a href="#main-title">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                </a>  
                </li>

                <li class="sidebar-list-item">
                    <a href="#main-organizers">
                        <span class="material-symbols-outlined">hub</span> Organizers
                    </a>
                </li>
                
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">summarize</span> Events
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">checklist_rtl</span> Services
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">payments</span> Payment
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">event_seat</span> Booking
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">calendar_month</span> Calendar
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">fact_check</span> Complition
                </li>

                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">message</span> Messages
                </li>


                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">settings</span> Settings
                </li>
            </ul>
        </aside>
        <!--end of sidebar-->

        <!--start of main-container-->
        <main class="main-container">
            <!--dashboard-->
            <div class="main-title">
                <p class="font-weight-bold">Dashboard</p>
            </div>
            <!--end of dashboard-->
            <!--start of  organizers-->
            <div class="main-organizers">
                <p class="font-weight-bold">Organizers</p>
            </div>
            <!--end of organizers-->



        </main>
        <!--end of main-containe r-->

    </div>

    <!--js-->
    <script>
        var sidebarOpen = false;
        var sidebar = document.getElementById("sidebar");
        function openSidebar(){
            if(!sidebarOpen){
                sidebar.classList.add("sidebar-responsive");
                sidebarOpen = true;
            }
        }
        function closeSidebar(){

        }
        //for popup account-btn
        function accountToggle() {
        var toggle = document.getElementById("account");
            if (toggle.style.display === "none") {
                toggle.style.display = "block";
            } else {
                toggle.style.display = "none";
            }
        }
        //logout verification
        function logOut(){
            alert("Are you sure?");
        }

    </script>
</body>
</html>