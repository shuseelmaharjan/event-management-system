<?php
require_once('php/connection.php');
require_once('header.php');
?>


<link rel="stylesheet" href="css/main.css">
</head>
<style>
    .container {
        width: 100%;
        position: relative;
        padding-top: 70px;
    }

    .row {
        width: 80%;
        height: auto;
        margin: 20px auto;
        background-color: #fff;
        padding: 10px;
        display: grid;
        grid-gap: 30px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
    }
    .row h1{
        font-family: 'Ubuntu', sans-serif;
        font-size: 2rem;

    }
   
    .col {
        background-color: #efefef;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        cursor: pointer;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
    }

    .col img {
        width: 100%;
        max-width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .col .content{
        padding: 10px 20px;
        display: block;
        font-family: 'Poppins', sans-serif;
    }
    .col .content h1{
        font-size: 1.5rem;
        font-weight: 600;
        text-align: left;
        margin-top: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .col .content .truncate {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        margin-bottom: 10px; 
        font-size: 1rem;
        font-weight: 400;
        text-align: left;
        margin: 10px 0px;
        bottom: 0;

    }


    .col .content a{
        text-decoration: none;
        color: #fff; 
        cursor: pointer;
        margin-bottom: 40px;
        display: block; 
        padding: 10px 0; 
        background-color: green;
        width: 100%;
        border-radius: 5px; 
        text-align: center; 
        bottom: 0;
    }

    .col .content .postDate {
        position: absolute;
        bottom: 15px;
        right: 20px;
    }
    .popup{
        top: 0;
    }
    .news{
        width: 60%;
        background-color: #efefef;
        display: inline;
        padding: 20px;
    }
    
    .news h1 {
      color: green;
      font-size: 3rem;
      font-weight: 600;
    }
  
    .news img {
      float: left;
      margin: 5px;
      padding-right: 10px;
    }
  
    .news p {
      text-align: justify;
      font-size: 1rem;
    }
    .news .ref{
        display: flex;
        font-weight: 600;
        margin-top: 20px;
        justify-content: flex-end;
    }
    .news .ref span{
        font-weight: 400;
    }
    .news .ref p{
        margin-left: auto;
    }
    
    
</style>
<?php
require_once('nav.php');
?>

<div class="container">
    <div class="row">
        <h1>Updates</h1>
    </div>
    <div class="row">
        <?php
        $sql = "SELECT id, post_title, publish_date, publish_time, description, image 
        FROM tbl_blog ORDER BY publish_date DESC, publish_time DESC";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo"connection error";
        }
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)){
        ?>
            <div class="col">
                    <img src="blogUploads/<?php echo $row['image']; ?>" alt="image">

                    <div class="content">
                        <h1><?php echo $row['post_title']; ?></h1>
                        <p class="truncate"><?php echo $row['description']; ?></p>
                        <!-- <a href="#" class="btn">View Details</a> -->

                        <a href="view_details.php?id=<?php echo $row['id']; ?>">View Details</a>

                        <p class="postDate"><i class="fa-solid fa-calendar"></i> <?php echo $row['publish_date']; ?></p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</div>




<?php

require_once('footer.php');
?>
