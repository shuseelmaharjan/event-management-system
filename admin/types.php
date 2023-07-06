<?php
// Start session
session_start();
//db connection
include('../php/connection.php');
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS', '');
// define('DB_NAME', 'eveproject');

// class db_conn{
//     function __construct(){
//         $conn = mysqli_query(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//         $this -> dbh = $conn;
//         //check connection
//         if(mysqli_connect_error()){
//             echo"Failed to connect MYSQL" .mysqli_connect_error();
//         }
//     }
    
//     //Data insertion function
//     public function insert($category){
//         $res = mysqli_query($this->dbh,"INSERT INTO category (cat_type) VALUES ('$cat_type')");
//         return $res;
//     }

//     //data read function
//     public function fetchData(){
//         $result=mysqli_query($this->dbh,"SELECT * from category where id=$cat_id");
//         return $result;
//     }
//     //data one read function

//     }



// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}

include('header.php');
include('sidebar.php');
if(!empty($_POST)){
    $category = $_POST['eventCategory'];
    $query = "INSERT INTO category (cat_type) values ('$category')";
    $sqltype = mysqli_query($conn, $query);
    if(!$sqltype){
        echo"Error";
    }


}
?>
<!--start of container-->
<div class="main-container">
   <div class="row">
    <div class="col-md-12">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-md-8 d-flex justify-content-start">
                    <h2 class="ml-lg-2">Event Category</h2>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Category
                    </button>

                    <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    </div>
                   
                    <div class="modal-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                            <input type="text" class="form-control" id="eventCategory" name="eventCategory" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Add Category</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    
               
                    </div>
                   
                    </div>
                </div>
                </div>
                </div>
            </div>

        </div>
        <hr class="mt-2 mb-3"/>

        <!--table-->
        <table class="table table-sm">
        <thead class="table-dark">
            <tr class="shadow p-2 mb-2 bg-white rounded">
            <th scope="col-md-1">S.N.</th>
            <th scope="col-md-9">Category</th>
            <th scope="col-md-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $types = "SELECT * FROM category";
                $typeResponse = mysqli_query($conn, $types);
                foreach($typeResponse as $key => $type){
                    ?>
                        <tr class="shadow p-3 mb-3 bg-white rounded">

                            <td class="col-md-1"><?= ++$key;?></td>
                            <td class="col-md-9"><?= $type['cat_type'];?></td>
                            <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa-solid fa-eye"></i></button>
                                </li>
                                <li class="list-inline-item">
                                        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <a href="">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </a>
                                </li>
                            </ul>
                        </td>
                        </tr>
                    <?php
                }
            ?>
            
            
        </tbody>
        </table>
       
    </div>
    </div>
   </div>
 

   
</div>
<script>
    $('#myModal').modal(options)
</script>


<?php

require('footer.php');
?>