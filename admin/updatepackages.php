<?php
require_once('header.php');
require_once('sidebar.php');
require_once('php/authentication.php');
?>
<style>
   .box form{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(4, 1fr);
        outline: none;
    }
    .box form .input-box,
    #banner,
    #description{
        padding: 0px 10px;
    }
    .box form .input-box label {
        font-size: 1rem;
        font-weight: 600;
        display: block;
        margin: 10px 0px;
    }
    .box form .input-box input,
    .box form .input-box select{
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
    }
    .box form .input-box input[type=text], select, textarea{
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .two-columns{
        grid-column: span 4;
    }
    #description label{
        font-size: 1rem;
        font-weight: 600;
    }
    #my-textarea {
        width: 100%;
        min-height: 200px;
        resize: none;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
        margin: 10px 0px;
    }
    #button{
        grid-column: 4;
        margin-bottom: 20px;
    }
    #button button{
        color: #fafafb;
        background:  #1177aa;
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        font-weight: 600;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 15px;
        cursor: pointer;
    }
</style>
<?php
$pkgId = $_GET['criteria'];

// Fetch data based on the specified pkg_id
$sql = "SELECT p.pkg_id, p.pkg_name, p.pkg_cost, p.pkg_guest, p.pkg_description, p.service_id, s.ser_name
        FROM tbl_packages p
        INNER JOIN tbl_service s ON p.service_id = s.ser_id
        WHERE p.pkg_id = $pkgId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pkgName = $row['pkg_name'];
    $pkgCost = $row['pkg_cost'];
    $pkgGuest = $row['pkg_guest'];
    $pkgDescription = $row['pkg_description'];
    $serviceId = $row['service_id'];
    $serviceName = $row['ser_name'];
}

?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Update Packages
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <a href="services.php">
                        <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                        </div>
                    </a>
                    <div class="box">
                        
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="input-box">
                            <label for="">Select Package For:</label>
                            <?php
                            $sqlService = "SELECT ser_id, ser_name FROM tbl_service";
                            $resultService = $conn->query($sqlService);

                            if ($resultService->num_rows > 0) {
                                ?>
                                <select name="serviceId" id="type">
                                    <option value="" selected disabled>Select Package For</option>
                                    <?php
                                    while ($rowService = $resultService->fetch_assoc()) {
                                        $serId = $rowService['ser_id'];
                                        $serName = $rowService['ser_name'];
                                        ?>
                                        <option value="<?= $serId ?>" <?php echo ($serId == $serviceId) ? 'selected' : ''; ?>>
                                            <?= $serName ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php
                            } else {
                                echo 'No service data found.';
                            }
                            ?>
                        </div>

                        <div class="input-box" id="block">
                            <label for="">Package Name:</label>
                            <input type="text" name="packageName" placeholder="Package Name" value="<?php echo isset($pkgName) ? htmlspecialchars($pkgName) : ''; ?>">
                        </div>

                        <div class="input-box" id="block">
                            <label for="">Package Cost:</label>
                            <input type="number" name="packageCost" placeholder="Package Cost" value="<?php echo isset($pkgCost) ? $pkgCost : ''; ?>">
                        </div>

                        <div class="input-box" id="block">
                            <label for="">Number of Guests</label>
                            <input type="number" name="packageGuest" placeholder="Number of Guests" value="<?php echo isset($pkgGuest) ? $pkgGuest : ''; ?>">
                        </div>

                        <div id="description" class="two-columns">
                            <label for="">Description</label>
                            <textarea id="my-textarea" name="packageDescription"><?php echo isset($pkgDescription) ? htmlspecialchars($pkgDescription) : ''; ?></textarea>
                        </div>

                        <div class="input-box" id="button">
                            <button type="submit" name="update">Update Package</button>
                        </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
  
</div>

<?php 
require_once('messagebox.php');
$packageObj = new package($conn);


if (isset($_POST['update'])) {
    // Get data from the form
    $pkgId = $_GET['criteria']; // Assuming you have the criteria in the URL
    $serviceId = $_POST['serviceId'];
    $packageName = $_POST['packageName'];
    $packageCost = $_POST['packageCost'];
    $packageGuest = $_POST['packageGuest'];
    $packageDescription = $_POST['packageDescription'];

    // Call the updatePackage method
    if ($packageObj->updatePackage($pkgId, $serviceId, $packageName, $packageCost, $packageGuest, $packageDescription)) {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "green";';
        echo 'document.getElementById("displayMsg").innerText = "Package updated successfully.";';
        echo 'setTimeout(function () { window.location.href = "viewpackages.php"; }, 3000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Error updating the package.";';
        echo '</script>';
    }
}
?>
<script>
var currentPage = window.location.href;

var eventsLink = document.querySelector('a[href="services.php"]');

if (currentPage.includes("addpackages.php")) {
    eventsLink.classList.add("active");
}

    const textarea = document.getElementById('my-textarea');
    textarea.addEventListener('input', resizeTextarea);
    function resizeTextarea() {
  const textarea = document.getElementById('my-textarea');
  textarea.style.height = 'auto';
  textarea.style.height = `${textarea.scrollHeight}px`;
}

function previewBeforeUpload(id) {
    document.querySelector("#" + id).addEventListener("change", function (e) {
        if (e.target.files.length == 0) {
            return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        document.querySelector("#previewImage").src = url;
    });
}

previewBeforeUpload("selectFile");

</script>

<?php
require_once('footer.php');
?> 