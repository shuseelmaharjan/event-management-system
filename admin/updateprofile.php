<?php
require_once('header.php');
require_once('sidebar.php');
require_once('php/authentication.php');

?>
<style>
    .box form{
        width: 100%;
        position: relative;
        display: flex;
        
    }
    .box form .col{
        width: 25%;
    }
    .box form .col-2{
        width: 75%;
        display: block;
    }
    .col-2 .input-box input,
    .col-2 .input-box textarea{
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    .col-2 .input-box textarea{
        height: auto !important;
        padding: 15px;
    }
    .col-2 label,
    .col .banner .input-box{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        font-family: 'Poppins' sans-serif;
        font-size: 18px;
    }
    .row-1{
        display: grid;
        align-content: start;
        grid-template-columns: 1fr 1fr;
        margin: 10px 0px;
        grid-gap: 50px;
    }
    
    .row-1 .col-3{
        padding: 0;
        width: 100%;
    }
    .row-1 .col-3 .input-box{
        width: 100%;
       
    }

    .col-2 button{
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
    }
    #banner .input-box input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    #banner .input-box input {
        display:none;
    }
    #banner .input-box img {
        width:100%;
        height: 180px;
        object-fit:cover;
        cursor: pointer;
        box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
        margin: 20px 0px;
    }
    #banner .input-box div {
        position:relative;
        height:40px;
        margin-top:-40px;
        background:rgba(0,0,0,0.5);
        text-align:center;
        line-height:40px;
        font-size:13px;
        color:#f5f5f5;
        cursor: pointer;
        font-weight:600;
    }
    #banner div span {
        font-size:40px;
    }

</style>
<?php
    $sql = "SELECT * from tbl_admin where id = 1";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc(); // Fix the syntax error here

        $name = isset($row['name']) ? htmlspecialchars($row['name']) : '';
        $username = isset($row['username']) ? htmlspecialchars($row['username']) : '';
        $email = isset($row['email']) ? htmlspecialchars($row['email']) : '';
        $phone = isset($row['phone']) ? htmlspecialchars($row['phone']) : '';
    }
?>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Update Profile
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
        <div class="row">
               
               <div class="col-12">
                   <div class="box">

                   <form action="" method="post" enctype="multipart/form-data">
                        <div class="col" id="contentImg">
                            <div class="banner" id="banner">
                                <div class="input-box">
                                    <label for="">Select Image</label>
                                    <input type="file" name="image" id="selectFile" accept="image/*">
                                    <label for="selectFile" id="file-2-preview">
                                        <img id="previewImage" src="images/image.svg" alt="Thumbnail">
                                        <div>
                                            <span>+</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row-1">
                                <div class="col-3">
                                    <label for="name">Full Name:</label>
                                    <div class="input-box">
                                        <input type="text" name="name" placeholder="Full Name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="username">Username:</label>
                                    <div class="input-box">
                                        <input type="text" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row-1">
                                <div class="col-3">
                                    <label for="email">Email:</label>
                                    <div class="input-box">
                                        <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="phone">Phone:</label>
                                    <div class="input-box">
                                        <input type="number" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <button>Update</button>
                        </div>
                    </form>
                                             
                   </div>
               </div>
           </div>
            
            
        </div>
</div>
<?php
require_once('messagebox.php');
$adminInfo = new AdminInfo($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = 1; // Change this according to your requirements

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];

    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    $imageUploaded = !empty($_FILES["image"]["tmp_name"]);
    $existingImage = isset($_POST["existingImage"]) ? $_POST["existingImage"] : "";

    if ($imageUploaded && in_array($imageFileType, array('jpg', 'jpeg', 'png', 'webp'))) {
        $uploadDir = "images/";
        $uniqueFileName = uniqid() . '.' . $imageFileType;
        $targetFilePath = $uploadDir . $uniqueFileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            if ($adminInfo->updateUserData($name, $username, $email, $phone, $uniqueFileName)) {
                echo '<script>';
                echo 'document.getElementById("messageBox").style.background = "green";';
                echo 'document.getElementById("messageBox").style.display = "flex";';
                echo 'document.getElementById("displayMsg").innerText = "Data updated successfully.";';
                echo 'setTimeout(function () {
                        window.location.href = "editprofile.php";
                    }, 3000);';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'document.getElementById("messageBox").style.display = "flex";';
                echo 'document.getElementById("messageBox").style.background = "red";';
                echo 'document.getElementById("displayMsg").innerText = "Data could not be updated. Please try again later.";';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'document.getElementById("messageBox").style.display = "flex";';
            echo 'document.getElementById("messageBox").style.background = "red";';
            echo 'document.getElementById("displayMsg").innerText = "Error occurred while uploading the image.";';
            echo '</script>';
        }
    } else {
        if ($adminInfo->updateUserData($name, $username, $email, $phone, $uniqueFileName)) {
            echo "success";
        } else {
            // Failed
            echo "failed";
        }
    }
} 
?>
<script>


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