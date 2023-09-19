<?php
include('php/model.php');
// Start session
session_start();

// Check do the person logged in
if($_SESSION['username']==NULL){
    // Haven't log in
    echo('<script>alert("login first");</script>');
    header('location: login.php');
    exit;
}

include('header.php');
include('sidebar.php');

?>
<!--start of container-->
<div class="main-container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-md-8 d-fles justify-content-start">
              <h2 class="ml-lg-2">Manage Events</h2>
            </div>

            <!--addBtn-->
            <div class="col-md-4 d-flex justify-content-end">
              <!--Button trigger modal-->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEvent">
                Add Events
              </button>

              <!--start of modal-->
              <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addOgranizers" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Events</h5>
                    </div>
                    <div class="modal-body">
                      <!--start of form-->
                      <?php
                            //data insertion
                            if (isset($_POST['submit'])) {
                              $eventBy = $_POST['eventBy'];
                              $organizer = $_POST['organizer'];
                              $dateofStart = $_POST['dateofStart'];
                              $dateofEnd = $_POST['dateofEnd'];
                              $venue = $_POST['venue'];
                              $eventType = $_POST['eventType'];
                              $description = $_POST['description'];
                              $image = $_POST['image'];

                              $ins = new database();
                              $table = 'tbl_events';
                              $ins->insert('data', ['eventBy'=>$eventBy, 'organizer'=>$organizer, 'dateofStart'=>$dateofStart, 'dateofEnd'=>$dateofEnd, 'venue'=>$venue, 'eventType'=>$eventType,
                              'description'=>$description, 'image'=>$image]);
                              if($ins == true){
                                echo"success";
                              }else{
                                echo"error";
                              }
                            }
                        ?>
                      <form action="" method="post">
                          <!--start of form assets-->
                          <div class="row">
                                <div class="col">
                                    <label for="eventBy" class="form-group">Event By</label>
                                    <input type="text" class="form-control" name="eventBy">
                                </div>
                                <div class="col">
                                  <label for="organizer" class="form-group">Organizer:</label>
                                  <input type="text" class="form-control" name="organizer">
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="dateofend" class="form-group">Date of Start:</label>
                                    <input type="date" class="form-control" name="dateofStart">
                                </div>
                                <div class="col">
                                    <label for="date" class="form-group">Date of End:</label>
                                    <input type="date" class="form-control" name="dateofEnd">

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="venue" class="form-group">Venue:</label>
                                    <input type="text" class="form-control" name="venue">
                                </div>
                                <div class="col">
                                    <label for="eventType" class="form-group">Event Type</label>
                                    <select class="form-select" name="eventType" id="type" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col md-4">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Upload Image</label>
                              <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col md-1 d-flex justify-content-end">
                                <button class="btn btn-success" value="submit" name="submit">Add Event</button>
                                </div>
                            </div>
                            
                        </form>
                      <!--end of form-->
                    </div>
                  </div>

                </div>

              </div>
              <!--end of modal-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    include('footer.php');
    ?>