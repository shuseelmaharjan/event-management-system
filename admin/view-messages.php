<?php
require_once('header.php');
require_once('sidebar.php');

?>

<style>
    .box-header{
        border-bottom: 1px solid #ccc;
    }
    .box-header a{
        margin-right: 15px;
        align-items: center;
        text-align: center;
        font-size: 1em;
        padding: 10px;
    }
    .box-header a:hover{
        background-color: #ccc;
    }
    .box-body h1{
        font-size: 1.3rem;
        padding: 10px 0px;
    }
    .box-body h2{
        font-size: 1.1rem;
        font-weight: 400;
    }
    .dt{
        display: flex;
    }
    .dt h3{
        font-size: 1rem;
        font-weight: 400;
        margin-right: 20px;
        padding: 10px 0px;
    }
    h4{
        font-size: 1.2rem;
        font-weight: 500;
    }
    .box-body p{
        padding: 10px;
        border: 1px solid #ccc;
        margin-top: 10px;
    }
    .box-body .reply{
        display: flex;
        justify-content: flex-start;
        margin-top: 30px;
    }
    form{
        width: 100%;
        background-color: #fafafb;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;

    }
    form button{
        background-color: #02266C;
        color: #fff;
        font-family: 400;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    form .col-3{
        display: block;
        width: 100%;

    }
    form .col-3 span{
        background-color: #fff;
        padding: 5px 10px;
        border-radius: 15px;
        cursor: pointer;
        border: 1px solid #ccc;

    }
    form .col-3 .label{
        width: 100px;
        padding: 10px 0px;
    }
    form .col-3 input{
        padding: 10px;
        border: none;
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
    .box-body a{
        cursor: pointer;
    }
    form #closeForm{
        cursor: pointer;
        float: right;
    }
    .confirmation {
        z-index: 999;
        position: absolute;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .confirmationMsg {
        background-color: #fff;
        padding: 20px;
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;

    }
    .confirmationMsg .btns{
        display: flex;
        margin-top: 20px;
    }
    .confirmationMsg .btns a{
        padding: 20px;
        margin: 0px 20px;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 10px;
    }
    .confirmationMsg .cancel{
        background-color: #b90f0f;
        color: #fff;
        padding: 10px 20px;
        cursor: pointer;
        width: 100px;
        text-align: center;
    }
    .confirmationMsg .confirm{
        background-color: #22a613;
        color: #fff;
        padding: 10px 20px;
        cursor: pointer;
        width: 100px;
        text-align: center;

    }
</style>
<?php
$id = $_GET['criteria'];
$sql = "SELECT * FROM tbl_mail where id = $id";
$row = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($row)) {?>

<div class="confirmation" id="confirmation">
    <div class="confirmationMsg">
    <h1>Are you Sure?</h1>
    <div class="btns">
    <a class="cancel" onclick="btnCancel()">Cancel</a>
    <a class="confirm" href="messages.php?criteria=<?=$data['id']?>">Yes</a>
    </div>
    
    </div>
</div>
<div class="main">
        <div class="main-header">
            <div class="main-title">
                    View Mail
                </div>
                <div class="last-title">
                    <div class="user-details">
                    <img src="../profile/uploads/default.png" width="50px" alt="image">
                    <h1>User Admin</h1>
                    </div>
                </div>
        </div>
        <div class="main-content">
            
            <div class="row">
               
                <div class="col-12">
                    <div class="box">
                        
                            
                            
                        <div class="box-header">
                            <a href="messages.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <a onclick="openConfirmation()"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <div class="box-body overflow-scroll">
                                <h1>Name: <?=$data['name'];?></h1>
                                <h2>Email: <?=$data['email']?></h2>
                                <h2>Phone: <?=$data['phone']?></h2>
                                <span class="dt">
                                <h3>Date: <?=$data['publish_date']?></h3>
                                <h3>Time: <?=$data['publish_time']?></h3>
                                </span>
                                
                                <h4><?=$data['subject']?></h4>
                                <p><?=$data['message']?></p>
                                <div class="reply">

                                <a onclick="replymail()">Reply</a>
                                </div>
                        </div>
                        
                        <div id="replyForm">
                            <form action="" method="post">
                                <span id="closeForm" onclick="closeForm()"><i class="fa-solid fa-xmark"></i></span>

                                <div class="col-3">
                                    <div class="label">
                                        <label for="to">To:</label>
                                    </div>
                                    <span><?=$data['email']?></span>
                                    <input type="email" readonly hidden name="emailForward" value="<?=$data['email'];?>">
                                </div>
                                <div class="col-3">
                                    <div class="label">
                                        <label for="">Message</label>
                                    </div>
                                    <textarea id="my-textarea" name="reply"></textarea>
                                </div>
                                <button>Send</button>
                            </form>
                        </div>
                      
                        <?php
                    }?>
                    </div>
                </div>
            </div>
        </div>
                                
</div>
<script>
    document.getElementById("replyForm").style.display="none";
    document.getElementById("confirmation").style.display="none";

    function replymail(){
        document.getElementById("replyForm").style.display="block";
    }
    function closeForm(){
        document.getElementById("replyForm").style.display="none";

    }
    function btnCancel(){
        document.getElementById("confirmation").style.display="none";

    }   
    function openConfirmation(){
        document.getElementById("confirmation").style.display="flex";

    }
</script>

<?php
                                
require_once('footer.php');
?>