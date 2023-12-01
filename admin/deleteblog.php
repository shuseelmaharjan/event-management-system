<?php
require_once('header.php');
require_once('sidebar.php');

// Initialize the BlogPost object
$blogPost = new BlogPost($conn);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteData'])) {
    // Check if the 'deleteData' button is pressed

    // Sanitize and validate the 'id' parameter from GET
    $id = isset($_GET['criteria']) ? intval($_GET['criteria']) : 0;

    if ($id > 0) {
        // Call the deleteBlogPost method to delete the blog post
        if ($blogPost->deleteBlogPost($id)) {
            // Redirect to a success page or perform any other actions
            header('Location: success.php');
            exit();
        } else {
            echo "Failed to delete the blog post.";
        }
    } else {
        echo "Invalid or missing 'criteria' parameter.";
    }
}

$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$formData = mysqli_fetch_assoc($result);
?>

<style>
    .box{
        display: block;
    }
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
    .col-2 label{
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
    #delete a{
        display: block;
    }
    
   
    .box form .col img{
        width: 100%;
        height: 200px;
        left: 0;
        top: 0;
        object-fit: cover;
        position: relative;
        cursor: pointer;
    }
</style>

<div class="main">
        <div class="main-header">
            <div class="main-title">
                Event Types
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
                                <label for="chooseimg">Choose Image</label>
                                <input type="file" name="image" value="<?=$formData['image'];?>">
                                <?php if (!empty($formData['image'])) : ?>
                                    <img onclick="openImage()" src="<?=$formData['image'];?>" alt="Blog Image">
                                <?php endif; ?>
                            </div>
                            <div class="col-2">
                                <label for="title">Blog Title:</label>
                                <div class="input-box">
                                    <input type="text" name="title" readonly placeholder="Title" value="<?=$formData['post_title'];?>" required>
                                </div>
                                
                                <div class="row-1">
                                    <div class="col-3">
                                        <label for="author">Author:</label>

                                        <div class="input-box">
                                            <input type="text" name="author" readonly placeholder="Author" value="<?=$formData['author_name'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="datePublish">Publish Date:</label>
                                        <div class="input-box">
                                            <input type="text" name="pdate" readonly value="<?=$formData['publish_date'];?>"><br>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <div class="input-box">
                                        <textarea name="description" id="editor" width="100%" id="" cols="90" rows="20" readonly><?=$formData['description'];?></textarea>
                                    </div>
                                </div>    
                                <!-- <div class="deleteBtn">
                                        <input type="button" name="deleteData" value="Delete Post">
                                </div> -->
                            </div>
                        </form>
                        
                        <div id="delete">
                            <a href="deleteblog.php?criteria=<?=$formData['id'];?>">Delete</a>
                        </div>
                                              
                    </div>
                </div>
            </div>
        </div>
  
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
 ClassicEditor
        .create(document.querySelector('#editor'), {

        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'undo',
                'redo'
            ]
        }
    })
   
    .catch(error => {
        console.error(error);
    });
   
</script>


<?php
require_once('footer.php');
?>