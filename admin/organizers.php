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
if(!empty($_POST)){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $type = $_POST['type'];
    

    $sql = "INSERT INTO organizers (name, address, date, phone1, phone2, type) VALUES ('$name', '$address', '$date', '$phone1', '$phone2', '$type')";
    $response = mysqli_query($conn, $sql);
    if(!$response){
        echo"error";
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
                    <h2 class="ml-lg-2">Manage Organizers</h2>
    
          </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup-add-organizers">
                    Add New Organizers
                    </button>
                    
                    <!-- Modal -->
                <div class="modal fade" id="popup-add-organizers" tabindex="-1" role="dialog" aria-labelledby="addOgranizers" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOgranizers">Add Organizers</h5>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col md-4">
                                    <label for="organizer" class="form-group">Organizer</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="location" class="form-group">Location:</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="col">
                                    <label for="date" class="form-group">Date:</label>
                                    <input type="date" class="form-control" name="date">

                                </div>.ro
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="contact" class="form-group">Phone 1:</label>
                                    <input type="number" class="form-control" name="phone1">
                                </div>
                                <div class="col">
                                    <label for="contact" class="form-group">Phone 2:</label>
                                    <input type="number" class="form-control" name="phone2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-4">
                                    <label for="type">Type:</label>
                                    <?php 
                                        $query = "SELECT catName FROM tbl_category";
                                        $result = $conn->query($query);
                                        if($result->num_rows> 0){
                                        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }?>
                                        <select class="form-select" name="type" id="type" aria-label="Default select example">
                                        <option selected>Open this select menu</option>

                                        <?php
                                        foreach ($options as $option){
                                            ?>
                                            <option value="<?=$option['catName']?>"><?=$option['catName']?></option>
                                            <?php
                                        }
                                    ?>
                                    
                                    
                                </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col md-1 d-flex justify-content-end">
                                <button class="btn btn-success" value="submit" name="submit">Submit</button>
                                </div>
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
       

        <?php 
        $per_page=12;
        $start=0;
        $current_page=1;
        if(isset($_GET['start'])){
            $start=$_GET['start'];
            if($start<=0){
                $start=0;
                $current_page=1;
            }else{
                $current_page=$start;
                $start--;
                $start=$start*$per_page;
            }
        } 
        $record=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM organizers"));
        $pagi=ceil($record/$per_page);
        
        $sql="SELECT * FROM organizers limit $start,$per_page";
        $res=mysqli_query($conn,$sql);
       
            ?>
   
  <table class="table table-sm">
        <thead class="table-dark">
            <tr class="shadow p-2 mb-2 bg-white rounded">
            <th scope="col">S.N.</th>
            <th scope="col">Organizer</th>
            <th scope="col">Location</th>
            <th scope="col">Contact</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    
	<?php 
    $org = "SELECT * FROM organizers";
    $organizerRespose = mysqli_query($conn, $org);
    foreach($organizerRespose as $key => $organizer){
        // var_dump($organizer);
        // exit;
    
	if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){?>
        <tr class="shadow p-3 mb-3 bg-white rounded">

        <td class="col-md-1"><?=$row['orgainzer_id'];?></td>
        <td class="col-md-3"><?=$row['name'];?></td>
                        <td class="col-md-3"><?=$row['address'];?></td>
                        <td class="col-md-3"><?=$row['phone1'];?></td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="?criteria=<?php $row['orgainzer_id'] ?>">
                                        <button class="btn btn-primary btn-sm rounded-0" data-toggle="modal" type="button" data-placement="top" data-target="#viewData" title="View"><i class="fa-solid fa-eye"></i></button>
                                        </a>
                                 
                                </li>
                                <li class="list-inline-item">
                                    <a href="#update">
                                     <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="php/delete.php ? criteria=<?= $row['orgainzer_id']?>">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

                                    </a>
                                </li>
                            </ul>
                        </td>
        </tr>
		
    <?php } } else {?>
	No records
	<?php } }?>
        </tbody>
    </table>

  <ul class="pagination mt-30">
	<?php 
	for($i=1;$i<=$pagi;$i++){
	$class='';
	if($current_page==$i){
		?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
	}else{
	?>
		<li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
	<?php
	}
	?>
    
	<?php } ?>
  </ul>

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