<?php
require_once('header.php');
require_once('sidebar.php');


$blogPost = new BlogPost($conn);

if (isset($_POST["title"], $_POST["author"], $_POST["pdate"], $_POST["description"]) && isset($_FILES["image"])) {
    if ($_FILES["image"]["error"] === 0) {
        ob_start();
        $title = $_POST["title"];
        $author = $_POST["author"];
        $publishDate = $_POST["pdate"];
        $current_time = date("H:i:s");
        $description = $_POST["description"];
        $imageFileName = $_FILES["image"]["name"];
        $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));

        $uploadDir = "../blogUploads/";
        $uniqueFileName = uniqid() . '.' . $imageFileType;
        $targetFilePath = $uploadDir . $uniqueFileName;

        if (in_array($imageFileType, array('jpg', 'jpeg', 'png'))) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                try {
                    if ($blogPost->insertBlogPost($title, $author, $publishDate, $current_time, $description, $targetFilePath)) {
                        echo("data inserted successfully now redirecting to blog.php");
                        exit();
                       
                    } else {
                        throw new Exception("Error: Blog post insertion failed.");
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
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
    ob_end_flush();
}
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
    
</style>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Add Blog Post
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
                    <div class="box">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col" id="contentImg">
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
                            </div>
                            <div class="col-2">
                                <label for="title">Blog Title:</label>
                                <div class="input-box">
                                    <input type="text" name="title" placeholder="Title" required>
                                </div>
                                
                                <div class="row-1">
                                    <div class="col-3">
                                        <label for="author">Author:</label>

                                        <div class="input-box">
                                            <input type="text" name="author" placeholder="Author" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="datePublish">Publish Date:</label>
                                        <div class="input-box">
                                            <input type="text" name="pdate" readonly value="<?php echo date('Y-m-d'); ?>"><br>
                                        </div>
                                    </div>

                                </div>
                                <div id="description" class="two-columns">
                                    <label for="">Description</label>
                                    <textarea id="my-textarea" name="description"></textarea>
                                </div>
                                
                                <button>Post</button>
                                
                            </div>
                        </form>
                                              
                    </div>
                </div>
            </div>
        </div>
  
</div>
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