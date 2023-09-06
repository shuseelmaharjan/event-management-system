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
<body>
    <?php
        require_once('login.php');
    ?>
    <div class="container" >
        <div class="wrapper">
            <div class="heading" id="trending">
                <h1>Trending</h1>
            </div>
            <div class="highlights">
                <div class="row">
                    <div class="col">
                        <a href="#">
                        <img src="" alt="">
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos ex ullam sunt? Porro officia, </p>
                        <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </a>
                        
                    </div>

                    <div class="col">
                        <a href="#">
                        <img src="" alt="">
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos ex ullam sunt? Porro officia, </p>
                        <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </a>
                        
                    </div>

                    <div class="col">
                        <a href="#">
                        <img src="" alt="">
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos ex ullam sunt? Porro officia, </p>
                        <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </a>
                        
                    </div>
                </div>
            </div>


            <div class="heading" id="news">
                <h1>News</h1>
            </div>



            <div class="otherBlogs">
                <div class="row">
                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                </div>


                <div class="row">
                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                </div>



                <div class="row">
                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="#">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="title">
                            <h1>Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</h1>
                            <p id="date"><i class="fa-solid fa-calendar"></i> June 2, 2023</p>
                        </div>
                        </a>
                    </div>

                </div>
            </div>


        </div>
       
    </div>
</body>
<style>
    .container{
        width: 100%;
        background-color: #E9E9E9;    
        height: 100%;
        
    }
    .container .wrapper{
        padding: 40px;
        width: 80%;
        margin-left: 10%;
    }

    .container .heading h1{
        font-size: 32px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        color:#000 ;
    }
    #trending{
        padding: 0px 0px 20px 0px;
    }
    #news{
        padding: 40px 0px 0px 0px;
    }
    .container .highlights .row{
        display: flex;
        justify-content: space-between;
    }
    .container .row a{
        text-decoration: none;
    }
    .container .highlights .row .col{
        width: 30%;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background: #fff;

    }
    .highlights .row .col img{
        width: 100%;
        background-color: #3e3e3e;
        height: 200px;

    }
    .highlights .row .col h1{
        font-size: 18px;
        font-weight: bold;
        color: #000;
        font-family: 'Ubuntu', sans-serif;
        padding: 10px 0px;
        width: 100%;
    }
    .highlights .row .col p{
        line-height: normal!important;
        color: #000;
        font-size: 12px;
        padding: 10px 0px;
    }
    #date{
        text-align: right;
    }
    .otherBlogs{
        margin-top: 40px;
    }
    .otherBlogs .row{
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .otherBlogs .row .col{
        width: 45%;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background: #fff;
        display: flex;
        justify-content: space-between;
    }
    .otherBlogs .row .col .image{
        width: 20%;
        position: relative;
        float: left;
        padding: 10px 0px;
    }
    .otherBlogs .row .col .image img{
        width: 100%;
        background-color: #3e3e3e;
        height: 80px;
    }
    .otherBlogs .row .col .title{
        width: 80%;
        position: relative;
        float: right;
    }
    .otherBlogs .row .col .title h1{
        padding: 10px;
        color: #000;
        font-family: 'Ubuntu', sans-serif;
        
    }
    .otherBlogs .row .col .title p{
        font-size: 14px;
        color: #000;
    }
</style>
<?php

require_once('footer.php');
?>
