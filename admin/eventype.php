<?php
require_once('header.php');
require_once('sidebar.php');
require_once('php/authentication.php');
?>
<style>
  
    .add-form{
        display: flex;
        background-image: linear-gradient(to right, #1A0051, #02266C );;
        margin: 10px 0px;
    }
    .add-form .form{
        color: #fff;
        padding: 10px;
        justify-content: flex-end;
    }
    .add-form .form form label{
        font-size: 1rem;
        font-weight: 600;
    }
    .add-form .form form input{
        padding: 10px 15px;
        font-size: 1rem;
        border: none;
        width: 300px;
        margin-left: 20px;
    }

    .add-form .form form #btn{
        padding: 10px 15px;
        font-size: 1rem;
        background-color: #22a613;
        border: none;
        color: #fff;
        font-weight: 600;
        width: 100px;
        cursor: pointer;
        transition: ease 0.5s;
    }
    .add-form .form form #btn:hover{
        background-color: #b90f0f;
        transition: ease 0.5s;

    }
    .eventType{
        background-color: #fff;
        width: 400px;
        height: auto;
        padding: 20px;
    }
    .eventType h1{
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    .eventType form{
        display: block;
    }
    .eventType form label{
        font-size: 1.2rem;
        margin: 10px 0px;
    }
    .eventType form input{
        width: 100%;
        padding: 15px;
        margin: 10px 0px;
        font-size: 1.2rem;
    }
    .eventType form #updateBtn{
        font-weight: 600;
        color: #fff;
        font-size: 1rem;
        border: none;
        background-color:#22A613 ;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    .eventType form #updateBtn:hover{
        background-color: #b90f0f;
        color: #fff;
        transition: ease 0.5s;
    }
    .popup{
        z-index: 999;
        background-color: rgba(0, 0, 0, 0.6);
        padding: 0;
        width: 100%;
        height: 100vh;
        position: absolute;
        margin: 0;
        display: none;
        justify-content: center;
        align-items: center;
    }
    
   
</style>
<?php
//data create
$addType = new eventType($conn);
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addType'])){
    $name = $_POST['addType'];

    $addType->insertType($name);
    
}

//data deletion
$deletedata = new eventType($conn);
if (isset($_GET['criteria'])) {
    $typeID = $_GET['criteria'];
    
    if ($deletedata->deleteType($typeID)) {
        echo "Data deleted";
    } else {
        echo "Deletion failed:" ; 
    }
}
//update data


?>
<div class="popup">
<span id="closeFormBtn" class="closeBtn" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></span>

    <div class="eventType">
        <h1>Edit Event Type</h1>
        <form action="">
            <label for="name">Your event type was:</label>
            <input type="text" name="name" placeholder="Event Type name">
            <input type="button" name="updateType" id="updateBtn" value="Update">
        </form>
    </div>
</div>
<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Event Types
            </div>
        </div>
        
        <div class="main-content">
           
            
            <div class="row">
               
                <div class="col-12">
                    <div class="box" id="top-row">
                    <div class="add-form">
                            <div class="form">
                                <form action="" method="post">
                                    <label for="addform">Add Event Type</label>
                                    <input type="text" name="addType" placeholder="Event Type">
                                    <input type="button" name="addType" id="btn" value="Add Event Type">
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Event Type List
                        </div>
                       
                        <div class="box-body overflow-scroll">
                            
                        <?php
                            $recordsPerPage = 10;

                            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                $currentPage = $_GET['page'];
                            } else {
                                $currentPage = 1;
                            }

                            $offset = ($currentPage - 1) * $recordsPerPage;

                            $sqlCount = "SELECT COUNT(*) as total FROM tbl_types";
                            $resultCount = mysqli_query($conn, $sqlCount);
                            $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                            $totalPages = ceil($totalRecords / $recordsPerPage);

                            $sql = "SELECT * FROM tbl_types LIMIT $offset, $recordsPerPage";
                            $result = mysqli_query($conn, $sql);
                        ?>

                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">S.N.</th>
                                        <th class="left">Type Name</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serialNumber = $offset + 1;

                                    if ($result !== false) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $serialNumber; ?>.</td>
                                                <td class="left"><?php echo $row['name']; ?></td>
                                                <td class="center">
                                                    <a onclick="editBtn()" href="" class="edit" ><span><i class="fa-solid fa-pen-to-square"></i> Edit</span></a>
                                                    <a onclick="sureDelete()" href="eventype.php?criteria=<?= $row['type_id']; ?>" class="delete" ><span><i class="fa-solid fa-trash"></i> Delete</span></a>

                                                </td>
                                            </tr>
                                            <?php
                                            $serialNumber++; 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                                   
                            

                           
                        </div>
                       
                    </div>
                    <div class="pagination">
                                <?php if ($currentPage > 1): ?>
                                    <a href="?page=<?php echo ($currentPage - 1); ?>"><i class="fa-solid fa-angles-left"></i> Previous</a>
                                <?php endif; ?>
                                
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages): ?>
                                    <a href="?page=<?php echo ($currentPage + 1); ?>">Next <i class="fa-solid fa-angles-right"></i></a>
                                <?php endif; ?>
                            </div>
                </div>
            </div>
        </div>
</div>
<script>
    function editBtn(){
        document.getElementById("popup").style.display="flex";
        console.log("test");

    }
    function closeBtn(){
        document.getElementById("popup").style.display="none";


    }
    function sureDelete(){
        alert("Are you sure?");
        console.log("data deleted");
    }
</script>

<?php
require_once('footer.php');
?>