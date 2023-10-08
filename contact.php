<?php
require_once('php/connection.php');
require_once('header.php');
?>


<link rel="stylesheet" href="css/main.css">
</head>
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
        width: 50%;
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
        padding: 20px;
    }
    .form .row {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px 20px; 
        justify-content: space-between;
    }

    .form .col {
        width: 100%;
        padding: 10px;
    }

    .form .col label {
        width: 100%; 
        font-size: 16px;
        font-weight: 600;
    }

    .form .col input{
        width: 90%; 
        padding: 10px 10px;
        margin-top: 5px;
        font-size: 16px;
    }
    
    .form .col textarea {
        width: 95%; 
        padding: 10px 10px;
        margin-top: 5px;
        font-size: 16px;
    }

    #textarea {
        grid-column: span 2;
    }

    .form .row button {
        text-align: center;
        border: none;
        color: #fff;
        padding: 1em 1.8em;
        background: #a80b59;
        display: flex;
        align-items: center;
        margin-top: 20px;
        font-weight: bold;
        cursor: pointer;
        
    }
    #btn{
        grid-column: 2;
        display: flex;
        justify-content: end;
    }
    .alertMsg{
        width: 100%; 
    }
    .alertMsg .msg{
        width: 100%;
        padding: 10px;
        font-size: 1em;
        background-color: #d1ecf1;
        border: 1px solid #bee5eb;
        display: flex;
        justify-content: space-between;
    }
    .alertMsg .msg p{
        color: #000;
    }

</style>
<body>
<?php
require_once('nav.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $date = date("Y-m-d");
    $time = date("H:i:s");

    $query = "INSERT INTO tbl_mail (name, email, subject, phone, message, publish_date, publish_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $subject, $phone, $message, $date, $time);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Message sent successfully";
        } else {
            echo "Error: " . mysqli_error($conn); 
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the SQL statement";
    }
}
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
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Full Name" name="name" required>
                </div>
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Your Email" name="email" required>
                </div>
                <div class="col">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="col">
                    <label for="phone">Phone:</label>
                    <input type="number" name="phone" placeholder="Phone Number">
                </div>
                <div class="col" id="textarea">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="col" id="btn">
                    <button type="submit" name="sentMail">Send Message</button>
                </div>
            </div>
        </form>
        <div class="alertMsg">
            <div class="msg">
                <p id="message"></p>
                <p id="closeBtn"><i class="fa-solid fa-xmark"></i></p>
            </div>
        </div>
        </div>
        </div>
        
    </div>
    <script>
        document.getElementById("message").innerText="TEst";
    </script>
</body>


<?php
require_once('footer.php');
?>
