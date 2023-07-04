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
            <h1>UP COMMING EVENTS</h1>
            <div class="wrapper">
                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/art.png" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Art Exhibition</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong> Baneshwor, Kathmandu</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Join this Event</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/newari.jpg" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Cultural Festival</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong>Kathmandu</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Free Entry</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/art.png" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Type</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong>Lokanthali, Ktm</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Join this Event</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/art.png" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Art Exhibition</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong> Baneshwor, Kathmandu</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Join this Event</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/newari.jpg" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Cultural Festival</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong>Kathmandu</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Join this Event</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col1">
                        <!--image-->
                        <img src="images/art.png" alt="image">
                    </div>
                    <div class="col2">
                        <p>2023-04-05</p>
                        <p>to</p>
                        <p>2023-04-10</p>
                    </div>
                    <div class="col3">
                        <p>Type</p>
                    </div>
                    <div class="col4">
                        <p><strong>Location: </strong>Lokanthali, Ktm</p>
                    </div>
                    <div class="col5">
                        <button>View Details</button>
                    </div>
                    <div class="col6">
                        <button>Join this Event</button>
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
    }

    .container .heading h1{
        font-size: 32px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 400;
        margin-left: 10%;
        padding: 40px 20px 0px 20px;
    }
    .container .row{
        width: 80%;
        background-color: #fff;
        text-align: center;
        margin-left: 10%;
        box-shadow: 10px 10px 15px #aaaaaa;    
        padding: 10px;
        height: 220px;
        border-radius: 20px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-top: 30px;
    }
    .container .row .col1{
        width: 15%;
        padding: 10px;
    }
    .container .row .col1 img{
        width: 150px;
        
    }
    .container .row .col2,
    .container .row .col3, 
    .container .row .col4{
        width: 15%;
        text-align: center;
        vertical-align: middle;
        font-size: 18px;
        font-family: 'Ubuntu', sans-serif;
    }
    .container .row .col5{
        width: 15%;
        padding: 0px 5px;

    }
    .container .row .col6{
        width: 25%;
        padding: 0px 5px;
    }
    .container .row .col5 button,
    .container .row .col6 button{
        width: 80%;
        font-family: "Ubuntu", sans-serif;
        font-size: 14px;
        font-weight: 400;
        background: #006a07;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property:  box-shadow, transform;
        transition-property:   box-shadow, transform;
        border: none;
    }
    .container .row .col5 button:hover,
    .container .row .col6 button:hover{
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);

    }
</style>
<?php
    require_once('footer.php');
?>