<?php
require_once('connection.php');

if(!empty($_POST['username'])){
    $query = "SELECT * FROM tbl_users WHERE username='" .$_POST["username"] ."'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count>0){
        echo"<span style='color:red'>Username already exists.</span>";
        echo"<script>$<'#submit').prop('disable'.true);</script>";
    }else{
        echo"<span style='color:green'>Username available</span>";
        echo"<script>$<'#submit').prop('disable'.false);</script>";
    }
}
?>
