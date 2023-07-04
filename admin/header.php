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