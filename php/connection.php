<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbName = 'eventmgmt';

$conn = mysqli_connect($hostname, $username, $password, $dbName);
if(!$conn){
    echo('Database Not Connected');
}
?>