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
    <div class="container">
        <div class="wrapper">
            <h1>Our Packages</h1>
            <h2>Search your Package</h2>
            <div class="form">
                <form action="#">
                    <label for="destination">Destination:</label>
                    <input type="text" name="destination">
                    <label for="date">Date:</label>
                    <input type="date" name="data">
                    <label for="eventType">Event Type</label>
                    <select name="type" id="type">
                        <option value="marriage">Marriage</option>
                        <option value="music">Music</option>
                        <option value="music">Cultural</option>
                        <option value="music">Dance</option>
                        <option value="music">Food</option>
                    </select>
                </form>
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
        padding: 40px;
        width: 100%;
        
        margin-left: 10%;
    }

</style>
