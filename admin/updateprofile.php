<?php
require_once('header.php');
require_once('sidebar.php');
?>
<style>
        .box form{
        width: 100%;
        position: relative;
        display: flex;
        
    }
    .box form .col{
        width: 25%;
    }
    .box form .col-2{
        width: 75%;
        display: block;
    }
    .col-2 .input-box input,
    .col-2 .input-box textarea{
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    .col-2 .input-box textarea{
        height: auto !important;
        padding: 15px;
    }
    .col-2 label,
    .col .banner .input-box{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        font-family: 'Poppins' sans-serif;
        font-size: 18px;
    }
    .row-1{
        display: grid;
        align-content: start;
        grid-template-columns: 1fr 1fr;
        margin: 10px 0px;
        grid-gap: 50px;
    }
    
    .row-1 .col-3{
        padding: 0;
        width: 100%;
    }
    .row-1 .col-3 .input-box{
        width: 100%;
       
    }

    .col-2 button{
        color: #fafafb;
        background:  #1177aa;
        height: 45px;
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
        font-weight: 600;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        margin-top: 15px;
    }
    #banner .input-box input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    #banner .input-box input {
        display:none;
    }
    #banner .input-box img {
        width:100%;
        height: 180px;
        object-fit:cover;
        cursor: pointer;
        box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
        margin: 20px 0px;
    }
    #banner .input-box div {
        position:relative;
        height:40px;
        margin-top:-40px;
        background:rgba(0,0,0,0.5);
        text-align:center;
        line-height:40px;
        font-size:13px;
        color:#f5f5f5;
        cursor: pointer;
        font-weight:600;
    }
    #banner div span {
        font-size:40px;
    }
    .two-columns{
        grid-column: span 2;
    }
    #description label{
        font-size: 1rem;
        font-weight: 600;
    }
    #my-textarea {
        width: 100%;
        min-height: 200px;
        resize: none;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
        margin: 10px 0px;
    }
</style>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Update Profile
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            
        <div class="row">
               
               <div class="col-12">
                   <div class="box">
                   <?php
                   
                    $sql = "SELECT * FROM tbl_admin WHERE id = 1"; 
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);

                   
                        function displayNA($value) {
                            return $value !== null ? $value : "N/A";
                        }

                        $name = displayNA($row['name']);
                        $username = displayNA($row['username']);
                        $email = displayNA($row['email']);
                        $phone = displayNA($row['phone']);
                        $fname = displayNA($row['fname']);
                        $mname = displayNA($row['mname']);
                        $paddress = displayNA($row['paddress']);
                        $taddress = displayNA($row['taddress']);
                        $dob = displayNA($row['dob']);
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    
                    
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Capture form data
                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $fname = $_POST['fname'];
                        $mname = $_POST['mname'];
                        $paddress = $_POST['paddress'];
                        $taddress = $_POST['taddress'];
                        $dob = $_POST['dob'];

                        // Construct the SQL query to update the record in tbl_admin
                        $updateQuery = "UPDATE tbl_admin SET
                                        name = '$name',
                                        username = '$username',
                                        email = '$email',
                                        phone = '$phone',
                                        fname = '$fname',
                                        mname = '$mname',
                                        paddress = '$paddress',
                                        taddress = '$taddress',
                                        dob = '$dob'
                                        WHERE id = 1"; // Assuming you want to update the record with admin_id = 1

                        // Perform the SQL query
                        $result = mysqli_query($conn, $updateQuery);

                        if ($result) {
                            echo "Data updated successfully";
                        } else {
                            echo "Error updating data: " . mysqli_error($conn);
                        }
                    }
                    ?>

                       <form action="" method="post" enctype="multipart/form-data">
                           <div class="col" id="contentImg">
                               <div class="banner" id="banner">
                                   <div class="input-box">
                                       <label for="">Select Image</label>
                                       <input type="file" name="image" id="selectFile" accept="image/*">
                                       <label for="selectFile" id="file-2-preview">
                                           <img id="previewImage" src="eventImages/default.jpg" alt="Thumbnail">
                                           <div>
                                               <span>+</span>
                                           </div>
                                       </label>
                                   </div>
                               </div>
                           </div>
                           <div class="col-2">
                               
                               
                               <div class="row-1">
                                   <div class="col-3">
                                       <label for="name">Full Name:</label>
                                       <div class="input-box">
                                           <input type="text" name="name" placeholder="Full Name" value="<?php echo $name; ?>" required>
                                       </div>
                                   </div>
                                   <div class="col-3">
                                       <label for="username">Username:</label>
                                       <div class="input-box">
                                           <input type="text" name="username"  value="<?php echo $username;?>">
                                       </div>
                                   </div>

                               </div>
                               <div class="row-1">
                                   <div class="col-3">
                                       <label for="email">Email:</label>
                                       <div class="input-box">
                                           <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                                       </div>
                                   </div>
                                   <div class="col-3">
                                       <label for="phone">Phone:</label>
                                       <div class="input-box">
                                           <input type="number" name="phone"  value="<?php echo $phone; ?>">
                                       </div>
                                   </div>

                               </div>
                               <div class="row-1">
                                   <div class="col-3">
                                       <label for="fatherName">Father Name:</label>
                                       <div class="input-box">
                                           <input type="text" name="fname" placeholder="Father Name" value="<?php echo $fname; ?>">
                                       </div>
                                   </div>
                                   <div class="col-3">
                                       <label for="motherName">Mother Name:</label>
                                       <div class="input-box">
                                           <input type="text" name="mname" placeholder="Mother Name" value="<?php echo $mname; ?>">
                                       </div>
                                   </div>

                               </div>
                               <div class="row-1">
                                   <div class="col-3">
                                       <label for="paddress">Permanent Address:</label>
                                       <div class="input-box">
                                           <input type="text" name="paddress" placeholder="Permanent Address" value="<?php echo $paddress; ?>">
                                       </div>
                                   </div>
                                   <div class="col-3">
                                       <label for="taddress">Temporary Address:</label>
                                       <div class="input-box">
                                           <input type="text" name="taddress" placeholder="Temporary Address" value="<?php echo $taddress; ?>">
                                       </div>
                                   </div>

                               </div>
                               <div class="row-1">
                               <div class="col-3">
                                    <label for="dob">Date of Birth:</label>
                                    <div class="input-box">
                                        <input type="date" name="dob" value="<?php echo ($dob !== "N/A") ? $dob : ""; ?>">
                                    </div>
                                </div>

                                  

                               </div>
                              
                               
                               <button>Update</button>
                               
                           </div>
                       </form>
                                             
                   </div>
               </div>
           </div>
            
            
        </div>
</div>
<script>


    function previewBeforeUpload(id) {
    document.querySelector("#" + id).addEventListener("change", function (e) {
        if (e.target.files.length == 0) {
            return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        document.querySelector("#previewImage").src = url;
    });
}

previewBeforeUpload("selectFile");
</script>
<?php
require_once('footer.php');
?>