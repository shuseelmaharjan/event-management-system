<?php
//redirection
session_start();

include('../../php/connection.php');

$id = $_GET['criteria'];
$query = "DELETE FROM tbl_category WHERE catid =$id ";

$res = mysqli_query($conn, $query);

if($res){
    header('Location:../organizers.php');
}else{
    echo"error";
}