<?php
require_once('php/connection.php');
require_once('header.php');
?>
<link rel="stylesheet" href="css/main.css">
</head>
<?php
require_once('nav.php');
?>
<body>
    <style>
        .container{
            width: 100%;
            background-color: #efefef;
            display: block;
            padding: 0px 0px 0px 0px;
        }
        .container .col{
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 15px;
        }
        .container .col img{
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .container .col h1{
            font-size: 3rem;
            color: #02266C;
            margin-bottom: 20px;
        }
        .container .col .row{
            display: flex;
            justify-content: flex-end;
        }
        .container .col .row p{
            font-weight: 600;
            font-size: 18px;
            padding: 10px;
        }
        .container .col .row p span{
            font-weight: 400;
        }
        .container .col p{
            font-size: 1.3rem;
            padding: 20px 0px;
        }

        .additionalBlogs,
        .more{
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(2, 1fr);
            outline: none;
        }
        .more{
            margin-top: 30px;
        }
        .data {
            background: #efefef;
            padding: 10px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .data img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }
        .data a{
            text-decoration: none;
        }

        .data a h1 {
            font-size: 1.5rem;
            padding: 5px;
            margin: 0; 
            text-decoration: none;
            color: #000;
        }
        .next{
            width: 60%;
            margin: 0 auto;
            background-color: #ffff;
            padding: 30px;
            font-family: 'Ubuntu', sans-serif;
            text-align: center;
        }
        .next a{
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            background: #02266C;
            color: #fff;
            padding: 10px 20px;
            border-radius: 15px;
        }
        .more h1{
            color: #02266C;        
        }
        .breadcum{
            width: 60%;
            padding: 30px;
            margin: 0 auto;
            font-family: 'Ubuntu', sans-serif;
            cursor: pointer;
            margin-top: 70px;

        }
        .breadcum a{
            color: #000;
            padding: 0px 5px;
            text-decoration: none;
            font-weight: 600;
          
        }


        
    </style>
    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="breadcum">
            <a href="blog.php">Blogs</a>\<a>Read More</a>
        </div>
        <div class="col">
            <h1><?php echo $row["post_title"]; ?></h1>
            <img src="eventUploads/<?= $row['image'];?>" alt="">
            
            <p><?=$row['description'];?></p>
            <div class="row">
                <p>Published Date: <span><?=$row['publish_date'];?></span></p>
                <p>Author: <span><?=$row['author_name'];?></span></p>
                <p>Published Time: <span><?=$row['publish_time'];?></span></p>
            </div>
        </div>
        <div class="more">
            <h1>Additonal Blogs</h1>
        </div>
        
        <div class="additionalBlogs">
            <?php
            $randsql = "SELECT * FROM tbl_blog ORDER BY RAND() LIMIT 2";
            $randresult = mysqli_query($conn, $randsql);

            if (mysqli_num_rows($randresult) > 0) {
                while ($output = mysqli_fetch_assoc($randresult)) {
            ?>
                    <div class="col-2">
                        <div class="data">
                            <a href="view_details.php?id=<?= $output['id'] ?>">
                                <img src="blogUploads/<?= $output['image'] ?>" alt="image">
                                <h1><?= $output['post_title']; ?></h1>
                            </a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No random data found.";
            }
            ?>
        </div>
        <div class="next">
            <a href="blog.php">View More</a>
        </div>

    </div>


    



</body>


<?php
    require_once('footer.php');
?>
