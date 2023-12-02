<?php
require_once('header.php');
require_once('sidebar.php');
require_once('php/authentication.php');
?>
<style>
   .box form{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(3, 1fr);
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
        grid-column: span 2;
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
        grid-column: 3;
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
    #banner{
        grid-row: span 2;
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
        height: 250px;
        object-fit:cover;
        cursor: pointer;
        box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
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
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Add Service
            </div>
            <?php require_once('profile.php');?>

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
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div class="input-box" id="block">
                                    <label for="">Service Name:</label>
                                    <input type="text" Name="serviceName" placeholder="Service Name">

                                </div>
                                
                                <div class="input-box">
                                    <label for="">Event Type</label>
                                    <?php
                                    
                                    
                                    $sql = "SELECT type_id, name FROM tbl_types";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    ?>
                                    <select name="eventType" id="type">
                                        <option value="" selected disabled>Select Event Type</option>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            $typeId = $row['type_id'];
                                            $typeName = $row['name'];
                                            ?>
                                            <option value="<?= $typeId ?>"><?= $typeName ?></option>
                                        <?php }?>
                                    </select>
                                    <?php } else {
                                        echo 'No data found.';
                                    }
                                    ?>
                                </div>


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
                               
                                <div id="description" class="two-columns">
                                    <label for="">Description</label>
                                    <textarea id="my-textarea" name="description"></textarea>
                                </div>
                                
                                <div class="input-box" id="button">
                                    <button type="submit" name="submit">Add Events</button>
                                </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
  
</div>
<?php 
require_once('messagebox.php');
$addService = new service($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    echo "Event Type: " . $_POST['eventType'];
    if ($_FILES['image']['error'] == 0) {
        $serviceName = $_POST['serviceName'];
        $eventType = $_POST['eventType'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $uploadDir = "../serviceUploads/";
        $uniqueFileName = uniqid() . '.' . $imageFileType;
        $targetFilePath = $uploadDir . $uniqueFileName; 

        if (in_array($imageFileType, array('jpg', 'jpeg', 'png'))) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
              
                    if ($addService->insertService($serviceName, $eventType, $description, $uniqueFileName)) {
                        echo '<script>';
                        echo 'document.getElementById("messageBox").style.display = "flex";';
                        echo 'document.getElementById("messageBox").style.background = "green";';
                        echo 'document.getElementById("displayMsg").innerText = "Service added successfully.";';
                        echo'setTimeout(function () {
                            window.location.href = "services.php";
                        }, 3000);';
                        echo '</script>';
                    } else {
                        echo '<script>';
                        echo 'document.getElementById("messageBox").style.display = "flex";';
                        echo 'document.getElementById("messageBox").style.background = "red";';
                        echo 'document.getElementById("displayMsg").innerText = "Failed to add service!";';
                        echo '</script>';
                    }
                
            } else {
                echo '<script>';
                echo 'document.getElementById("messageBox").style.background = "red";';
                echo 'document.getElementById("messageBox").style.display = "flex";';
                echo 'document.getElementById("displayMsg").innerText = "Error uploading the image.";';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'document.getElementById("messageBox").style.background = "red";';
            echo 'document.getElementById("messageBox").style.display = "flex";';
            echo 'document.getElementById("displayMsg").innerText = "Only jpg, jpeg, and png file types are allowed.";';
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Failed to add service!";';
        echo '</script>';
    }
}

?>
<script>
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