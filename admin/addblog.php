<?php
require_once('header.php');
require_once('sidebar.php');

// Create an instance of the BlogPost class
$blogPost = new BlogPost($conn);

if (isset($_POST["title"], $_POST["author"], $_POST["pdate"], $_POST["description"]) && isset($_FILES["image"])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publishDate = $_POST["pdate"];
    $description = $_POST["description"];
    $image = $_FILES["image"]["name"]; // Assumes you have a file input named "image"

    // Define the upload directory and move the uploaded image
    $uploadDir = "blogImages/"; // You may need to create this directory
    $targetFilePath = $uploadDir . $image;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Insert the blog post into the database
        if ($blogPost->insertBlogPost($title, $author, $publishDate, $description, $targetFilePath)) {
            // Insertion successful
            echo("success");
            exit();
        } else {
            // Insertion failed
            echo "Error: Blog post insertion failed.";
        }
    } else {
        echo "Error uploading the image.";
    }
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
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Add Blogs
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="box">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col">
                                <label for="image">Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="col-2">
                                <div class="input-box">
                                    <label for="title">Blog Title:</label>
                                    <input type="text" name="title" placeholder="Title">
                                </div>
                                
                                <div class="row-1">
                                    <div class="col-3">
                                        <div class="input-box">
                                            <label for="suthor">Author:</label>
                                            <input type="text" name="author" placeholder="Author">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-box">
                                            <label for="datePublish">Publish Date:</label>
                                            <input type="text" name="pdate" readonly value="<?php echo date('Y-m-d'); ?>"><br>
                                        </div>
                                    </div>

                                </div>
                                <div class="input-box">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea> 
                                </div>
                                
                                <button>Post</button>
                            </div>
                        </form>
                                              
                    </div>
                </div>
            </div>
        </div>
  
</div>

<?php
require_once('footer.php');
?>