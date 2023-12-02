<?php
require_once('header.php');
require_once('sidebar.php');



?>
<style>
   
</style>
<!--popup view data-->
<div class="wrapper" id="wrapper">
    <span class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></span>
    <div class="content">
        <h1>Heloo</h1>
        <img src="blogImages/650fcaa59c0f1.jpg" alt="image">
        <div class="row">
            <span><h1>Author:</h1> <p> <?php echo $row['id']; ?></p></span>
            <span><h1>Published Date:</h1><p>July 20, 2023</p></span>
            <span><h1>Time:</h1> <p>02:23 AM</p></span>
        </div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi labore dolore odit fuga, asperiores assumenda exercitationem facere quos recusandae laborum similique fugit in commodi deleniti, suscipit doloribus perferendis ipsa!</p>
    </div>
</div>
<!--end popup view data-->



<div class="main">
        <div class="main-header">
            <div class="main-title">
                    Blogs
                </div>
                <?php
                    require_once('profile.php');
                ?>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div id="addBtn">
                        <a href="addblog.php">Add Blog Post</a>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            All Posted Blogs
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th class="left">Title</th>
                                        <th class="center">Author</th>
                                        <th class="center">Date of Published</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    $recordsPerPage = 10;

                                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                        $currentPage = $_GET['page'];
                                    } else {
                                        $currentPage = 1;
                                    }

                                    $offset = ($currentPage - 1) * $recordsPerPage;

                                    $sqlCount = "SELECT COUNT(*) as total FROM tbl_blog";
                                    $resultCount = mysqli_query($conn, $sqlCount);
                                    $totalRecords = mysqli_fetch_assoc($resultCount)['total'];

                                    $totalPages = ceil($totalRecords / $recordsPerPage);
                                ?>

                                <tbody>
                                    <?php
                                    $sql = "SELECT id, post_title, author_name, publish_date FROM tbl_blog ORDER BY publish_date DESC LIMIT $offset, $recordsPerPage";
                                    $result = $conn->query($sql);
                                    if (!$result) {
                                        die("Query failed: " . $conn->error);
                                    }
                                    
                                    $serialNumber = ($currentPage - 1) * $recordsPerPage + 1;
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="center"><?php echo($serialNumber); ?></td>
                                            <td class="left"><?php echo($row['post_title']); ?></td>
                                            <td class="center"><?php echo($row['author_name']); ?></td>
                                            <td class="center"><?php echo($row['publish_date']); ?></td>
                                            <td class="center">
                                                <a href="viewblogs.php?criteria=<?=$row['id']?>" class="view"><span><i class="fa-solid fa-eye"></i></span></a>
                                                <a href="updateBlog.php?criteria=<?=$row['id'];?>" class="edit" onclick="editBtn()"><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                                                <a href="javascript:void(0);" class="delete" onclick="confirmDelete('blog.php?criteria=<?=$row['id']?>')"><span><i class="fa-solid fa-trash"></i></span></a>

                                            </td>
                                        </tr>
                                    <?php
                                        $serialNumber++; 
                                    }
                                    $result->close();
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
    function confirmDelete(redirectUrl) {
        var confirmation = confirm("Are you sure you want to delete this record?");

        if (confirmation) {
            // If confirmation is true, redirect to the server to handle the deletion
            window.location.href = redirectUrl;
        }
    }
</script>

<?php
$deletedata = new BlogPost($conn);
if (isset($_GET['criteria'])) {
    $id = $_GET['criteria'];
    
    if ($deletedata->deleteBlogPost($id)) {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Data deleted successfully.";';
        echo 'setTimeout(function () { window.location.href = "blog.php"; }, 3000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Error deleting blog.";';
        echo '</script>';
    }
}

                                
require_once('footer.php');
?>