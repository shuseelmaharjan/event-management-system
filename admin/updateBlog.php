<?php
require_once('header.php');
require_once('sidebar.php');


$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$formData = mysqli_fetch_assoc($result);



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
            Update Blog
        </div>
        <?php
            require_once('profile.php');
        ?>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <a href="blog.php">
                    <div class="breadcum">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                </a>
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
                            <div id="description" class="two-columns">
                                <label for="">Description</label>
                                <textarea id="my-textarea" name="description"><?=$formData['description'];?> </textarea>
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
$blogPost = new BlogPost($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['author'], $_POST['pdate'], $_POST['description'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publishDate = date('Y-m-d');
    $description = $_POST['description'];

    if (!empty($_FILES['image']['tmp_name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image = $target_file;
        } else {
            echo 'Failed to upload image.';
            exit();
        }
    } else {
        $image = $formData['image'];
    }
    if ($blogPost->updateBlogPost($id, $title, $author, $publishDate, $description, $image)) {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "green";';
        echo 'document.getElementById("displayMsg").innerText = "Data updated successfully.";';
        echo'setTimeout(function () {
            window.location.href = "blog.php";
        }, 3000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Failed to update blog.";';
        echo '</script>';
    }
}
?>



<?php
require_once('footer.php');
?>