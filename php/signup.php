<?php

require_once('connection.php');
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO users (name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')";
    $sql = mysqli_query($conn, $query);

    if(!$sql){
        echo "Error: ";
        exit;
    }else{
        echo"success";
        header('location: ../index.php');
    }
}

?>