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

        $uploadDir = "blogImages/";
        $uniqueFileName = uniqid() . '.' . $imageFileType;
        $targetFilePath = $uploadDir . $uniqueFileName;

        // Check file type
        if (in_array($imageFileType, array('jpg', 'jpeg', 'png'))) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                try {
                    if ($blogPost->insertBlogPost($title, $author, $publishDate, $current_time, $description, $targetFilePath)) {
                        
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
    .col-2 .input-box label{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        font-family: 'Poppins' sans-serif;
        font-size: 18px;
    }
    .row-1{
        padding: 0;
    }
    
    .box form .col-2 label{
        display: block;

    }
    .col-2 button{
        color: #ccc;
        background: blue;
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 15px;
    }
    .row-1{
        display: flex;
        margin-top: 15px;
 
    }
    
</style>
<div class="main">
        <div class="main-header">
            
            <div class="main-title">
                Add Blogs
            </div>

            <div class="sidebar-user-info">
                <img src="./images/user-image.jpg" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    Admin
                </div>
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="box">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col" id="contentImg">
                                <label for="chooseimg">Choose Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="col-2">
                                <div class="input-box">
                                    <label for="title">Blog Title:</label>
                                    <input type="text" name="title" placeholder="Title" required>
                                </div>
                                
                                <div class="row-1">
                                    <div class="col-3">
                                        <div class="input-box">
                                            <label for="suthor">Author:</label>
                                            <input type="text" name="author" placeholder="Author" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-box">
                                            <label for="datePublish">Publish Date:</label>
                                            <input type="text" name="pdate" readonly value="<?php echo date('Y-m-d'); ?>"><br>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <!-- <textare id="editor" name="description" cols="30" rows="10"></textarea> -->
                                    <textarea name="description" width="100%" id="" cols="90" rows="20"></textarea>
                                </div>

                                
                                <button>Post</button>
                            </div>
                        </form>
                                              
                    </div>
                </div>
            </div>
        </div>
  
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
 ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php
require_once('footer.php');
?>