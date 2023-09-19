<?php

class addCategory
{
    public function __construct()
    {
        $db = new Database;
        // $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        require_once ('../config/database.php');
        $eventCategory = $inputData['eventCategory'];
        $eventDescription = $inputData['eventDescription'];

        $query = "INSERT INTO tbl_category (catName,catDescription) VALUES ('$eventCategory','$eventDescription')";
        // $result = $this->conn->query($studentQuery);
        $result = mysqli_query($conn, $query);
        if($result){
            header('Location: ../types.php');
        }else{
            echo"Data not inserted";
            return false;
        }
    }
}
?>