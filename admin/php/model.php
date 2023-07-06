<?php
class Model{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'eventmgmt'
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
        if($this->conn->connect_error){
            echo"Connection Failed"
        }else{
            echo"Connected";
        }
    }//constructor close
}//class close
$obj = new Model();
?>