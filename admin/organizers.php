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
                        <h5 class="modal-title" id="addOgranizers">Add New Organizers</h5>
                        
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

                                </div>
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
                                <select class="form-select" name="type" id="type" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                    ?>
                    <tr class="shadow p-3 mb-3 bg-white rounded">

                        <td class="col-md-1"><?=++$key;?></td>
                        <td class="col-md-3"><?=$organizer['name'];?></td>
                        <td class="col-md-3"><?=$organizer['address'];?></td>
                        <td class="col-md-3"><?=$organizer['phone1'];?></td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa-solid fa-eye"></i></button>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#update">
                                     <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="php/delete.php ? criteria=<?= $organizer['orgainzer_id']?>">
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
<script>
    $('#myModal').modal(options)
</script>


<?php

require('footer.php');
?>