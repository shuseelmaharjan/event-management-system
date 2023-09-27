<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
    .box .row{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
    }
    form label{
        display: block;

    }
    .row .col,
    .packages .col{
        outline: none;
        display: grid;
        padding: 10px;
        border: 1px solid #ccc;
        border: none;
    }
    .text{
        width: 100%;
    }
    #full-width {
        grid-column: 1 / 4;
    }
    .packages{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
    }
    
    #main-title{
        grid-template-columns: repeat(1, 1fr);
    }
</style>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Add Services
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            Services Details
                        </div>
                        <form action="" method="post">
                            <div class="grid-container">
                                <div class="row">
                                    <div class="col">
                                        <label for="title">Service Name</label>
                                        <input type="text" name="serviceName" placeholder="Service Name">
                                    </div>
                                    <div class="col">
                                        <label for="title">Service Type</label>
                                        <input type="text" name="serviceType" placeholder="Service Type">
                                    </div>
                                    <div class="col">
                                        <label for="image">Chooe Banner</label>
                                        <input type="file" name="banner" placeholder="Choose Image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" id="full-width">
                                        <label for="">Write Description of this service</label>
                                        <textarea name="serviceDescription" id="" cols="30" rows="7"></textarea>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="grid-container">
                                <button id="add-package" type="button">Add Package</button>
                            </div>
                            <input type="button" name="addservices" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
</div>
<script>
        var packageCounter = 0; 

        document.getElementById("add-package").addEventListener("click", function () {
    if (packageCounter < 4) { 
        packageCounter++;

        var gridContainer = document.querySelector(".grid-container");

        // create the box-header (first row)
        var boxHeader = document.createElement("div");
        boxHeader.classList.add("row", "box-header");
        boxHeader.innerHTML = '<div class="col">Package ' + packageCounter + '</div>';
        gridContainer.appendChild(boxHeader);

        // create the second row with three columns 
        var packageRow = document.createElement("div");
        packageRow.classList.add("packages");
        

        var col1 = document.createElement("div");
        col1.classList.add("col");
        col1.innerHTML = '<label for="name' + packageCounter + '">Package Name</label><input type="text" name="name' + packageCounter + '" placeholder="Package Name">';

        var col2 = document.createElement("div");
        col2.classList.add("col");
        col2.innerHTML = '<label for="cost' + packageCounter + '">Package Cost</label><input type="number" name="cost' + packageCounter + '" placeholder="Package Cost">';

        var col3 = document.createElement("div");
        col3.classList.add("col");
        col3.innerHTML = '<label for="guest' + packageCounter + '">Package Guest Limit</label><input type="number" name="guest' + packageCounter + '" placeholder="Guest Limit">';

        packageRow.appendChild(col1);
        packageRow.appendChild(col2);
        packageRow.appendChild(col3);
        gridContainer.appendChild(packageRow);

        // create the third row with one column for textarea
        var descriptionRow = document.createElement("div");
        descriptionRow.classList.add("package");

        var descriptionCol = document.createElement("div");
        descriptionCol.classList.add("col");
        descriptionCol.innerHTML = '<label for="description' + packageCounter + '">Description</label><textarea name="description' + packageCounter + '" id="description' + packageCounter + '" cols="30" rows="7"></textarea>';

        descriptionRow.appendChild(descriptionCol);
        gridContainer.appendChild(descriptionRow);

        if (packageCounter === 4) {
            document.getElementById("add-package").disabled = true;
        }
    }
});
</script>

<?php

require_once('../php/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addservices"])) {
    // Process the service data and insert into tbl_service
    $serviceName = $_POST["serviceName"];
    $serviceType = $_POST["serviceType"];
    $serviceDescription = $_POST["serviceDescription"];

    // Handle the file upload (banner)
    $uploadDir = "uploads/"; // Specify your upload directory
    $bannerFileName = $_FILES["banner"]["name"];
    $bannerFilePath = $uploadDir . $bannerFileName;

    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $bannerFilePath)) {
        // Insert data into tbl_service
        $sqlService = "INSERT INTO tbl_service (service_name, service_type, banner, description) VALUES (?, ?, ?, ?)";
        $stmtService = mysqli_prepare($conn, $sqlService);
        mysqli_stmt_bind_param($stmtService, "ssss", $serviceName, $serviceType, $bannerFilePath, $serviceDescription);
        mysqli_stmt_execute($stmtService);
        mysqli_stmt_close($stmtService);

        // Insert package data into tbl_packages (loop through packages)
        for ($i = 1; $i <= 4; $i++) {
            $packageName = $_POST["name$i"];
            $packageCost = $_POST["cost$i"];
            $guestLimit = $_POST["guest$i"];
            $packageDescription = $_POST["description$i"];

            $sqlPackage = "INSERT INTO tbl_packages (package_name, package_cost, guest_limit, description) VALUES (?, ?, ?, ?)";
            $stmtPackage = mysqli_prepare($conn, $sqlPackage);
            mysqli_stmt_bind_param($stmtPackage, "siss", $packageName, $packageCost, $guestLimit, $packageDescription);
            mysqli_stmt_execute($stmtPackage);
            mysqli_stmt_close($stmtPackage);
        }

        // Redirect to a success page or perform other actions
        header("Location: success.php");
        exit;
    } else {
        echo "Error uploading the banner image.";
    }
}

require_once('footer.php');
?>