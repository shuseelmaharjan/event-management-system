
<?php
        require_once('header.php');
        require_once('sidebar.php');
    ?>
   <style>
       .box form{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(3, 1fr);
        outline: none;
    }
    .col-2{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(4, 1fr);
    }
    .box form .input-box{
        padding: 0px 10px;
        margin-top: 20px;
    }
    .box form .input-box label {
        font-size: 1rem;
        font-weight: 600;
        display: block;
        margin: 10px 0px;
    }
    .box form .input-box input{
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
        margin-top: 10px;
    }
    .box form .input-box input[type=text], select, textarea{
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    #button{
        grid-column: 3;
        margin-bottom: 20px;
    }
    #button button{
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
        cursor: pointer;
    }
    #hideShow{
		font-size: 18px;
		margin: 10px 0px 0px 10px;
	}
	#chkBox .left{
		font-family: system-ui, sans-serif;
		display: flex;
	}
	#chkBox .left input[type=checkbox] {
		font-size: 12px;
		width: 15px;
		bottom: 10px;

	}
   </style>

    <div class="main">
        <div class="main-header">
           
            <div class="main-title">
                Change Password
            </div>
            <?php 
            require_once('profile.php');
            ?>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                    <form method="post">
                        <div class="form-group">
                        <div class="input-box" id="logInput">
                                                <span class="details">Current Password:</span>
                                                <input type="password" name="current_password" id="currentpassword" placeholder="Current Password" required>
                                            </div>

                                            <div class="input-box" id="logInput">
                                                <span class="details">New Password:</span>
                                                <input type="password" name="new_password" id="newpassword" placeholder="New Password" required>
                                            </div>

                                            <div class="input-box" id="logInput">
                                                <span class="details">Confirm Password:</span>
                                                <input type="password" name="confirm_password" id="confirmpassword" placeholder="Confirm password" required>
                                            </div>

                                            <div class="input-box" id="chkBox">
                                                <div class="left" >
                                                    <input type="checkbox" onclick="showHide()"><span id="hideShow"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="input-box" id="button">
                                                        <button type="submit" name="submit">Change Password</button>
                                                    </div>
                        </div>
                    </form>

                    </div>

                </div>
                
            </div>
            
        </div>
    </div>
  

<script>
          document.getElementById("hideShow").innerText = "Show Password";
        function showHide(){
            var x = document.getElementById("currentpassword");
			var y =document.getElementById("newpassword");
			var z =document.getElementById("confirmpassword");

            if (x.type && y.type && z.type === "password") {
                x.type = "text";
				y.type = "text";
				z.type = "text";
                document.getElementById("hideShow").innerText = "Hide Password";
            } else {
                x.type = "password";
				y.type = "password";
				z.type = "password";
                document.getElementById("hideShow").innerText = "Show Password";

            }
        }

</script>

<?php
require_once('messagebox.php');


function updatePassword($conn, $userId, $currentPassword, $newPassword, $confirmPassword)
{
    if ($newPassword !== $confirmPassword) {
        return false; 
    }

    if (!isCurrentPasswordValid($conn, $userId, $currentPassword)) {
        return false; 
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    $sql = "UPDATE tbl_admin SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashedPassword, $userId);

    if ($stmt->execute()) {
        return true; 
    } else {
        return false; 
    }
}
function isCurrentPasswordValid($conn, $userId, $currentPassword)
{
    $hashedPasswordFromDB = 'password';

    $sql = "SELECT password FROM tbl_admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($hashedPasswordFromDB);
    $stmt->fetch();
    $stmt->close();

    return password_verify($currentPassword, $hashedPasswordFromDB);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = 1; 

    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (updatePassword($conn, $userId, $currentPassword, $newPassword, $confirmPassword)) {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "green";';
        echo 'document.getElementById("displayMsg").innerText = "Password Changed Successfully.";';
        echo'setTimeout(function () {
            window.location.href = "changepassword.php";
        }, 3000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'document.getElementById("messageBox").style.display = "flex";';
        echo 'document.getElementById("messageBox").style.background = "red";';
        echo 'document.getElementById("displayMsg").innerText = "Incorrect current password.";';
        echo'setTimeout(function () {
            window.location.href = "changepassword.php";
        }, 3000);';
        echo '</script>';
    }
}


require_once('footer.php');
?>