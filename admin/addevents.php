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
$addEvent = new event($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if ($_FILES['image']['error'] == 0) {
        $eventName = $_POST['eventName'];
        $dateofStart = $_POST['dateofStart'];
        $dateofEnd = $_POST['dateofEnd'];
        $eventType = $_POST['eventType'];
        $venue = $_POST['venue'];
        $eventOrganizer = $_POST['eventOrganizer'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $uploadDir = "../eventUploads/";
        $uniqueFileName = uniqid() . '.' . $imageFileType;
        $targetFilePath = $uploadDir . $uniqueFileName;

        if (in_array($imageFileType, array('jpg', 'jpeg', 'png'))) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
              
                    if ($addEvent->insertEvent($eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName)) {
                        echo("data inserted successfully now redirecting to blog.php");
                        exit();
                    } else {
                        echo("failed");
                    }
                
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "Error: Only jpg, jpeg, and png file types are allowed.";
        }
    } else {
        echo "File upload error: " . $_FILES["image"]["error"];
    }
}

?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Add Event Program
            </div>
            <div class="last-title">
                <div class="user-details">
                <img src="../profile/uploads/default.png" width="50px" alt="image">
                <h1>User Admin</h1>
                </div>
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="breadcum">
                        <a href="events.php">Events</a> > <a href="addevents.php">Add Event Program</a>
                    </div>
                    <div class="box">
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div class="input-box" id="block">
                                    <label for="">Event Name:</label>
                                    <input type="text" Name="eventName" placeholder="Event Name">

                                </div>
                                <div class="input-box block">
                                    <label for="">Event Starting Date:</label>
                                    <input type="date" Name="dateofStart">
                                </div>
                                <div class="input-box">
                                    <label for="">Event Ending Date</label>
                                    <input type="date" Name="dateofEnd">

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


                                <div class="input-box">
                                    <label for="">Venue</label>
                                    <input type="text" name="venue" placeholder="Venue">
                                </div>
                                <div class="input-box">
                                    <label for="">Organizer</label>
                                    <input type="text" name="eventOrganizer" placeholder="Organizer Name">
                                </div>
                                <div id="description" class="two-columns">
                                    <label for="">Description</label>
                                    <textarea id="my-textarea" name="description"></textarea>
                                </div>
                                <div class="banner" id="banner">
                                    <div class="input-box">
                                        <label for="">Select Image</label>
                                        <input type="file" name="image" id="selectFile" accept="image/*">
                                        <label for="selectFile" id="file-2-preview">
                                            <img id="previewImage" src="eventImages/default.jpg" alt="Thumbnail">
                                            <div>
                                                <span>+</span>
                                            </div>
                                        </label>
                                    </div>
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