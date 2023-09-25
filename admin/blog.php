<?php
require_once('header.php');
require_once('sidebar.php');
?>

<!--popup view data-->
<div class="wrapper" id="wrapper">
    <span class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></span>
    <div class="content">
        <h1>Heloo</h1>
        <img src="./blogImages/650fcaa59c0f1.jpg" alt="image">
        <div class="row">
            <span><h1>Author:</h1> <p> Ram Bahadur</p></span>
            <span><h1>Published Date:</h1><p>July 20, 2023</p></span>
            <span><h1>Time:</h1> <p>02:23 AM</p></span>
        </div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi labore dolore odit fuga, asperiores assumenda exercitationem facere quos recusandae laborum similique fugit in commodi deleniti, suscipit doloribus perferendis ipsa!</p>
    </div>
</div>
<!--end popup view data-->


<!--popup edit data-->
<div class="editData" id="editData">
    <span class="close" onclick="closeEdit()"><i class="fa-solid fa-xmark"></i></span>
    <div class="popupForm">
        <form action="">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" placeholder="Title here">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" placeholder="Author name" id="author">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textare id="editor" name="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group" id="btn">
                <input type="submit" name="update" value="Save Changes">
            </div>
            
            
        </form>
    </div>
</div>
<!--end popup edit data-->

<!--start popup delete data-->
<div class="deleteData" id="deleteData">
    
    <div class="content">
        <form action="" method="post">
            <div class="row1">
                <h1>Confirm the action </h1>
                <span class="delClose" onclick="closeDel()"><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>Do you really want to delete this data?</h2>
            <div class="row">
            <input type="button" class="cancel" onclick="closeDel()" value="Cancel" name="cancel">
            <input type="button" class="confirm" value="Confirm" name="confirm">
            </div>
            
        </form>
        
        
    </div>


</div>
<!--end popup delete data-->


<div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                Blogs
            </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            All Posted Blogs
                        </div>
                        <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date of Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
// Number of records per page
$recordsPerPage = 10;

// Get the current page number from the URL
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $recordsPerPage;

// Fetch total number of records
$sqlCount = "SELECT COUNT(*) as total FROM tbl_blog";
$resultCount = mysqli_query($conn, $sqlCount);
$totalRecords = mysqli_fetch_assoc($resultCount)['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<tbody>
    <?php
$sql = "SELECT id, post_title, author_name, publish_date FROM tbl_blog ORDER BY publish_date DESC LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    
    // Calculate the starting serial number for the current page
    $serialNumber = ($currentPage - 1) * $recordsPerPage + 1;

    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo($serialNumber); ?></td>
            <td><?php echo($row['post_title']); ?></td>
            <td><?php echo($row['author_name']); ?></td>
            <td><?php echo($row['publish_date']); ?></td>
            <td>
                <a href="#" class="view" onclick="viewData()"><span><i class="fa-solid fa-eye"></i></span></a>
                <a href="#" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                <a href="#" class="delete" onclick="deleteBtn()"><span><i class="fa-solid fa-trash"></i></span></a>
            </td>
        </tr>
    <?php
        $serialNumber++; // Increment the serial number for the next row
    }
    $result->close();
    ?>
</tbody>

</table>

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
                    <!-- END ORDERS TABLE -->
                </div>
            </div>
        </div>
  
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    //CKEditor plugin
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        function viewData() {
            var wrapperPopup = document.querySelector('.wrapper');
            if (wrapperPopup) {
                wrapperPopup.style.display = "flex";
            }
        }

        function closeBtn() {
            var wrapperPopup = document.querySelector('.wrapper');
            if (wrapperPopup) {
                wrapperPopup.style.display = "none";
            }
        }

        function editBtn() {
            var editDataPopup = document.querySelector('.editData');
            if (editDataPopup) {
                editDataPopup.style.display = "flex";
            }
        }

        function deleteBtn() {
            var deleteDataPopup = document.querySelector('.deleteData');
            if (deleteDataPopup) {
                deleteDataPopup.style.display = "flex";
            }
            console.log("Delete Btn");
        }

        function closeEdit() {
            var editDataPopup = document.querySelector('.editData');
            if (editDataPopup) {
                editDataPopup.style.display = "none";
            }
        }

        function closeDel() {
            var deleteDataPopup = document.querySelector('.deleteData');
            if (deleteDataPopup) {
                deleteDataPopup.style.display = "none";
            }
        }

    
</script>

<?php
                                
require_once('footer.php');
?>