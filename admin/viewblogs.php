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
    .active {
        background-color: #22a613;
        color: white; 
        padding: 3px 10px;
        border-radius: 3px; 
        text-transform: capitalize;
    }

    .expired {
        background-color: #b90f0f;
        color: white; 
        padding: 3px 10px;
        border-radius: 3px; 
        text-transform: capitalize;
    }
    
</style>
<?php 
$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_blog WHERE id = $id";
$result = mysqli_query($conn, $sql);
$formData = mysqli_fetch_assoc($result);


?>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                View Blog
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
                        <h1><?=$formData['post_title']?></h1>
                        <img src="../eventUploads/<?php echo isset($formData['image']) ? $formData['image'] : ''; ?>" alt="image">
                        <div class="eveInfo">
                            <h2>Author: <span><?=$formData['author_name']?></span></h2>
                            <h2>Published Date: <span><?=$formData['publish_date']?></span></h2>
                            <h2>Published Time: <span><?=$formData['publish_time']?></span></h2>
                        </div>
                        <p><?=$formData['description']?></p>

                    </div>
                </div>
            </div>
        </div>
  
</div>


<?php
require_once('footer.php');
?> 