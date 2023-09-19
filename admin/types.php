<?php
// Start session
session_start();
// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}
include('../php/connection.php');
include('header.php');
include('sidebar.php');

//data insertion
if(isset($_POST['addCategory'])){
    $eventCategory = $_POST['eventCategory'];
    $catDescription = $_POST['catDescription'];

    $query = "SELECT * FROM tbl_category WHERE catName = '$eventCategory'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo 'something wrong';
    }
    if(mysqli_num_rows($result) == 0){
        $insertQuery = "INSERT INTO tbl_category (catName, catDescription) VALUES ('$eventCategory', '$catDescription')";
        $sql = mysqli_query($conn, $insertQuery);
        if($sql){
            echo'<div class="alert alert-success" role="alert">
            This is a success alert—check it out!
            <button type="button" class="close" id="closeBtn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fa-sharp fa-solid fa-xmark"></i></span>
            </button>
          </div>';
        }else{
            echo'<div class="alert alert-danger" role="alert">
            This is a danger alert—check it out!
          </div>';
    
        }
    }else{
        echo'<div id="alert" class="alert alert-danger" role="alert">
        Data already inserted, use different keyword.
        <button type="button" class="close" id="closeBtn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fa-sharp fa-solid fa-xmark"></i></span>
        </button>
      </div>';
    }
    
 

    
}
?>
<style>
    .alert{
        z-index: 999;
        position: absolute;
        right: 0;
        bottom: 0;
        margin-right: 60px;
    }
    .alert .message{
        padding: 20px;
       
    }
</style>
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



                        <!--start of form modal-->



                    <form action="" method="post">
                        <div class="form-group">
                            <label for="eventCategory" class="form-group">Event Category</label><br>
                            <input type="text" class="form-control" id="eventCategory" name="eventCategory" placeholder="Category Name">
                        </div><br>
                        <div class="form-group">
                            <label for="description">Category Description</label><br>
                            <textarea name="catDescription" id="catDescription" class="form-control" placeholder="Write a Description" cols="10" rows="10"></textarea>
                        </div>
                        <br>
                        <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success" name="addCategory">Add Category</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    
               
                    </div>
                   
                    </div>
                </div>
                </div>
                </div>
                <!--End of Modal-->

                <!--start of table-->
                <hr class="mt-2 mb-3"/>
            </div>

        </div>
        <?php

// Number of items to display per page
$itemsPerPage = 12;

// Get the current page number from the URL query string
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset
$offset = ($current_page - 1) * $itemsPerPage;

?>

    
<!--table-->
<table class="table table-sm">
<thead class="table-dark">
    <tr class="shadow p-2 mb-2 bg-white rounded">
    <th scope="col">S.N.</th>
    <th scope="col">Category</th>
    <th scope="col">Description</th>
    <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php

    // Calculate the starting serial number for the current page
$start_serial_number = ($current_page - 1) * $itemsPerPage + 1;
// Query to retrieve data from the database with the offset and limit
$query = "SELECT * FROM tbl_category LIMIT $offset, $itemsPerPage";
$result = mysqli_query($conn, $query);


// Display the data on the page
$serial_number = $start_serial_number;
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result)) {
    
?>

<tr class="shadow p-3 mb-3 bg-white rounded">


<td class="col-md-1"><?=   $serial_number  ?></td>
<td class="col-md-3"><?=$row['catName'];?></td>
<td class="col-md-6"><?=$row['catDescription'];?></td>
<td class="col-md-3">
    <!-- Call to action buttons -->
    <ul class="list-inline m-0">
        <li class="list-inline-item">
            <a href="#update">
             <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

            </a>
        </li>
        <li class="list-inline-item">
            <a href="php/deleteTypes.php  criteria = <?= $row['id'] ?>">
            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

            </a>
        </li>
    </ul>
</td>
</tr>
<?php
$serial_number++;
 } } else {?>
	No records
	<?php } ?>
        </tbody>
    </table>
    <?php




// Calculate the total number of pages
$totalItemsQuery = "SELECT COUNT(*) as total FROM tbl_category";
$totalItemsResult = mysqli_query($conn, $totalItemsQuery);
$totalItems = mysqli_fetch_assoc($totalItemsResult)['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Generate pagination links
echo "<div class='pagination mt-30'> ";
if ($current_page > 1) {
    echo "<a href='?page=" . ($current_page - 1) . "'>Previous</a>";
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=" . $i . "'>" . $i . "</a>  ";
}

if ($current_page < $totalPages) {
    echo "<a href='?page=" . ($current_page + 1) . "'>Next</a> ";
}
echo "</div>";
?>
<style>
    .pagination {
    display: inline-block;
    margin-top: 20px;
    }

    .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    }

    .pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}
</style>

        
    </div>
    </div>
   </div>
 

   
</div>
<script>
    $('#myModal').modal(options)

    $(alertComponent).alert(close)

   const closeBtn =document.getElementById('closeBtn');
   setTimeout(() => {
    $('#alert').alert('close')
   },5000);
   
</script>


<?php

require('footer.php');

?>