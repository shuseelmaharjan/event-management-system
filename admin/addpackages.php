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
$addPackage = new package($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $serviceId = $_POST['serviceId']; // Assuming serviceId is an integer
    $packageName = $_POST['packageName'];
    $packageCost = $_POST['packageCost'];
    $packageGuest = $_POST['packageGuest'];
    $packageDescription = $_POST['packageDescription'];

    $result = $addPackage->insertService($serviceId, $packageName, $packageCost, $packageGuest, $packageDescription);

    if ($result) {
        echo "Data inserted successfully Data inserted successfully Data inserted successfully Data inserted successfully Data inserted successfully";
    } else {
        echo "Data not inserted";
    }
}


?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Add Packages
            </div>
            <div class="last-title">
                <div class="user-details">
                <img src="images/default-1.png" width="50px" alt="image">
                <h1>User Admin</h1>
                </div>
            </div>
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

                            <div class="input-box">
                                    <label for="">Select Package For:</label>
                                    <?php
                                    
                                    
                                    $sql = "SELECT ser_id, ser_name FROM tbl_service";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    ?>
                                    <select name="serviceId" id="type">
                                        <option value="" selected disabled>Select Package For</option>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            $ser_id = $row['ser_id'];
                                            $serName = $row['ser_name'];
                                            ?>
                                            <option value="<?= $ser_id ?>"><?= $serName ?></option>
                                        <?php }?>
                                    </select>
                                    <?php } else {
                                        echo 'No data found.';
                                    }
                                    ?>
                                </div>

                                <div class="input-box" id="block">
                                    <label for="">Package Name:</label>
                                    <input type="text" name="packageName" placeholder="Package Name">
                                </div>

                                <div class="input-box" id="block">
                                    <label for="">Package Cost:</label>
                                    <input type="number" name="packageCost" placeholder="Package Cost">
                                </div>

                                <div class="input-box" id="block">
                                    <label for="">Number of Guests</label>
                                    <input type="number" name="packageGuest" placeholder="Number of Guests">
                                </div>
                                
                                


                                <div id="description" class="two-columns">
                                    <label for="">Description</label>
                                    <textarea id="my-textarea" name="packageDescription"></textarea>
                                </div>
                                
                                <div class="input-box" id="button">
                                    <button type="submit" name="submit">Add Package</button>
                                </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
  
</div>
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