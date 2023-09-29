<?php
require_once('header.php');
require_once('sidebar.php');


$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$formData = mysqli_fetch_assoc($result);

$blogPost = new BlogPost($conn);
if (isset($_POST["title"], $_POST["author"], $_POST["pdate"], $_POST["description"])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publishDate = date('Y-m-d');
    $description = $_POST["description"];
    $id = $_GET['criteria'];

    if (!empty($_FILES["image"]["tmp_name"])) {
        $target_dir = "uploads/";  
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        $image = $formData['image'];
    }

    if ($blogPost->updateBlogPost($id, $title, $author, $publishDate, $description, $image)) {
        echo("Data updated successfully");
        exit();
    } else {
        echo "Failed to update the blog post.";
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
   
    .box form .col img{
        width: 100%;
        height: 200px;
        left: 0;
        top: 0;
        object-fit: cover;
        position: relative;
        cursor: pointer;
    }
    .wrapper img{
        width: 600px;
        height: 400px;
    }
</style>
<!--popup view data-->
<div class="wrapper" id="wrapper">
    <span class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></span>
    <?php if (!empty($formData['image'])) : ?>
        <img src="<?=$formData['image'];?>" alt="Blog Image">
    <?php endif; ?>
</div>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                Event Types
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
                                <label for="chooseimg">Choose Image</label>
                                <input type="file" name="image" value="<?=$formData['image'];?>">
                                <?php if (!empty($formData['image'])) : ?>
                                    <img onclick="openImage()" src="<?=$formData['image'];?>" alt="Blog Image">
                                <?php endif; ?>
                            </div>
                            <div class="col-2">
                                <label for="title">Blog Title:</label>
                                <div class="input-box">
                                    <input type="text" name="title" placeholder="Title" value="<?=$formData['post_title'];?>" required>
                                </div>
                                
                                <div class="row-1">
                                    <div class="col-3">
                                        <label for="author">Author:</label>

                                        <div class="input-box">
                                            <input type="text" name="author" placeholder="Author" value="<?=$formData['author_name'];?>" required>
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
                                        <textarea name="description" id="editor" width="100%" id="" cols="90" rows="20" value="hero"></textarea>
                                    </div>
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
    .then(editor => {
            // Set the content of the CKEditor instance
            editor.setData(`<?=$formData['description'];?>`);
        })
    .catch(error => {
        console.error(error);
    });
    function closeBtn(){
        // Hide the overlay when closing
        document.getElementById("wrapper").style.display="none";
        // Enable pointer events for image and overlay
        document.querySelector('.box form .col img').style.pointerEvents = "auto";
        document.querySelector('.box form .col div').style.pointerEvents = "auto";
    }
    function openImage(){
        // Show the overlay when opening
        document.getElementById("wrapper").style.display="flex";
        // Disable pointer events for image and overlay
        document.querySelector('.box form .col img').style.pointerEvents = "none";
        document.querySelector('.box form .col div').style.pointerEvents = "none";
    }
</script>


<?php
require_once('footer.php');
?>