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
    <div class="container">
        <div class="wrapper">
            <h1>Our Packages</h1>
            <h2>Search your Package</h2>
            <div class="form">
                <form action="#">
                    <div class="col">
                        <label for="destination">Destination:</label><br>
                        <input type="text" name="destination" placeholder="Type your destination.">
                    </div>

                    <div class="col">
                        <label for="date">Date:</label><br>
                        <input type="date" name="data">
                    </div>

                    <div class="col">
                        <label for="eventType">Event Type</label><br>
                        <select name="type" id="type">
                            <option value="marriage">Marriage</option>
                            <option value="music">Music</option>
                            <option value="music">Cultural</option>
                            <option value="music">Dance</option>
                            <option value="music">Food</option>
                        </select>
                    </div>

                    <div class="button">
                        <button>Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="heading">
                <h1>Our Packages</h1>
            </div>
        <div class="packages">
            
            <div class="row">
                <div class="col">
                    <img src="images/service-1.jpg" alt="image">
                    <h1>Wedding Event</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>

                <div class="col">
                    <img src="images/service-3.jpg" alt="image">
                    <h1>Seminar</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>

                <div class="col">
                    <img src="images/service-5.jpg" alt="image">
                    <h1>Culture</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <img src="images/service-6.jpg" alt="image">
                    <h1>Music</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>

                <div class="col">
                    <img src="images/service-8.avif" alt="image">
                    <h1>Food Festival</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>

                <div class="col">
                    <img src="images/services-7.webp" alt="image">
                    <h1>Dance</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis quos veritatis sunt quo dolor doloremque sint, laborum voluptatum quaerat, ad libero recusandae cumque nihil itaque, saepe enim. Modi, quia!</p>
                    <div class="btn">
                        <button>Details</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<?php
    require_once('footer.php');
?>
<style>
    .container{
        width: 100%;
        background-color: #E9E9E9;    
        height: 100%;
        
    }
    .container .wrapper{
        width: 100%;
        background: url(images/services.jpg);
        object-fit: cover;
        height: 400px;
        background-repeat: no-repeat;
    }
    .wrapper h1{
        font-size:36px ;
        color: #fff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        margin-left: 15%;
        padding: 20px;
    }
    .wrapper h2{
        font-size: 36px;
        color: #fff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        margin-left: 15%;
        padding: 20px;
    }
    .form{
        width: 70%;
        border: none;
        background-color: #fff;
        margin-left: 15%;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 10px 10px 10px #3e3e3e;
        height: 100px;
        margin-top: 20px;
    }
    .form form{
        display: flex;
        width: 100%;
        justify-content: space-around;
        height: 100%;
        position: relative;
    }
    .form form col{
        display: block;
        width: 30%;
        padding: 20px;
    }
    form label{
        padding: 10px;
        font-size: 18px;
        font-family: 'Ubuntu', sans-serif;
    }
    form input,
    form select{
       margin-top: 20px;
       position: relative;
       width: 300px;
       padding: 10px 25px;
       border: none;
       background: #efefef;
       border-radius: 20px;
       color: #3e3e3e;
       font-size: 16px;
    }
    .button{
        z-index: 2;
        position: absolute;
        left: 0;
        bottom: -60px;
        align-items: center;
        display: flex;
        justify-content: space-around;
        width: 100%;
    }
    .button button{
        --arrow-width: 10px;
        --arrow-stroke: 2px;
        box-sizing: border-box;
        border: 0;
        border-radius: 20px;
        color: #fff;
        padding: 1em 2.8em;
        background: #a80b59;
        display: flex;
        transition: 0.3s background;
        align-items: center;
        gap: 0.6em;
        margin-top: 20px;
        font-weight: bold;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .packages{
        width: 90%;
        margin-left: 5%;
        padding: 30px;
       
    }
    .heading h1{
        font-size: 36px;
        color: #000;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        margin-left: 10%;
        margin-top: 30px;
    }
    .packages .row{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 30px;
    }
    .row .col{
        width: 30%;
        text-align: left;
        font-family: 'Ubuntu', sans-serif;
        background-color: #fff;
        box-shadow: 0px 0px 15px #616161;
    }
    .col img{
        width: 100%;
        height: 250px;
    }
    .col h1{
        padding: 20px;
        font-size: 29px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 600;
        padding: 10px 20px;
    }
    .col p{
        padding: 20px;
        font-size: 14px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        padding: 0px 20px;
    }
    .col .btn{
        padding: 30px;
    }
    .col .btn button{
        box-sizing: border-box;
        border: 0;
        border-radius: 20px;
        color: #fff;
        padding: 1em 1.8em;
        background: #02266C;
        text-align: center;
        font-weight: bold;
        width: 100%;
    }

   


</style>
