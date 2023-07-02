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
        require_once('signup.php');
    ?>
    <div class="container" margin-top="70px" background-color="#73000E">
        <div class="heading">
            <h1>Get in Touch with Us </h1>
        </div>
        <div class="row">

        
        <div class="content">
            <h1>Love to hear from you <i class="fa-solid fa-hand"></i></h1>
            <p><img src="images/undraw-contact.svg" alt="Image" class="img-fluid"></p>
        </div>
        <div class="form">
        <form action="#" method="post">
            <div class="row">
                <div class="col">
                <label for="name">Your Name</label>
                <input type="text" placeholder="Full Name" name="name">
                </div>
                <div class="col">
                <label for="email">Your Email:</label>
                <input type="email" placeholder="Your Email" name="email">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="subject">Subject:</label>
                <input type="text" placeholder="Subject" name="subject">
                </div>
                <div class="col">
                <label for="phone">Phone:</label>
                <input type="number" placeholder="Phone Number" name="phone">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="message">Message:</label><br>
                <textarea name="message" id="message" cols="100" rows="10"></textarea>

                </div>
            </div>
            <div class="row">
                <input type="button" value="Submit" name="submit">
            </div>
        </form>
        </div>
        </div>
        
    </div>
</body>
<style>
    .container{
        width: 100%;
        height: auto;
    }
    .heading{
        width: 100%;
        height: 80px;
        text-align: center;
    }
    .heading h1{
        font-family: 'Ubuntu', sans-serif;
        color: #000;
        padding: 20px;
        font-weight: 400;
    }
    .row{
        display: flex;
        width: 100%;
    }
    .content{
        width: 60%;
        font-family: 'Ubuntu', sans-serif;
    }
    .content h1{
        font-size: 22px;
        text-align: center;
        font-weight: 400;
        margin-top: 50px;
    }
    .content i{
        color: orange;
    }
    .content p{
        margin-left: 20%;
        margin-top: 50px;
    }
    .content p img{
        width: 80%;
        align-items: center;

    }
    .form{
        width: 40%;
        padding: 30px;
        
    }
    .form form{
        font-family: 'Ubuntu', sans-serif;
    }
    .form .col{
        width: 50%;
        padding: 10px 0px;
    }
    .form .col label{
        width: 10%;
        margin-top: 10px;
    }
    .form .col input{
        width: 90%;
        padding: 10px 0px;
        margin-top: 10px;
    }
    .form .col textarea{
        width: 100%;
        padding: 10px 0px;
        margin-top: 10px;
    }
</style>
