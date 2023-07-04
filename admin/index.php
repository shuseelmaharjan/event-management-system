<?php
include('../php/connection.php');
// Start session
session_start();

// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}

include('header.php');
include('sidebar.php');

?>

        <!--start of main-container-->
        <main class="main-container">
            <!--dashboard-->
            <div class="main-title">
                <p class="font-weight-bold">Dashboard</p>
            </div>
            <!--end of dashboard-->
          



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