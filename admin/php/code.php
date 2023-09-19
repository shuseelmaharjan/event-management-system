<?php
session_start();

include('../config/database.php');
include('../objects/crud.php');

$db = new Database;

if(isset($_POST['save_student']))
{
    $inputData = [
        'eventCategory' => mysqli_real_escape_string($db->conn,$_POST['eventCategory']),
        'eventDescription' => mysqli_real_escape_string($db->conn,$_POST['eventDescription']),
    ];

    $student = new addCategory;
    $result = $student->create($inputData);
    
    if($result)
    {
        $_SESSION['message'] = "Student Added Successfully";
        header("Location: ../types.php");
        exit(0);
    }
    else
    {
        echo "Data Not Inserted";
    }
}
?>