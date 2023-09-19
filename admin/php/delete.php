<?php
//redirection
session_start();

include('../../php/connection.php');

$id = $_GET['criteria'];
$query = "DELETE FROM organizers WHERE orgainzer_id =$id ";

$res = mysqli_query($conn, $query);

if($res){
    header('Location:../organizers.php');
}else{
    echo"error";
}
// public class CRUD{
//     public function deleteType(){
//         $id = $_GET['criteria'];
//         $query = "DELETE FROM types where deleteType = $id";
//         $response = mysqli_query($conn, $query);
//         if ($response) {
//             return true;
//         }
//     }
// }


