
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EMS | Change Password</title>
	<link rel="stylesheet" href="../css/main.css">
	<!--css for sidebar and container-->
	<link rel="stylesheet" href="css/style.css">
   

	<!--font awesome cdn-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
	<?php
	require_once('class/config.php');
	?>
<style>
	
	.danger{
		width: 100%;
		position: relative;
		background: #f2dede;
		padding: 10px;
		color: #a94442;
		height: 40px;
	}
	.success{
		width: 100%;
		position: relative;
		background: #dff0d8;
		padding: 10px;
		color: #3c763d;
		height: 40px;
	}
	#message, 
	#successMsg{
		float: left;
	}
	.danger .close{
		float: right;
		cursor: pointer;
		color: #e3bfbf;
	}
	.success .close{
		float: right;
		cursor: pointer;
		color: #bed8b9;
	}
	#hideShow{
		font-size: 18px;
	}
	#chkBox .left{
		font-family: system-ui, sans-serif;
		font-size: 1.5rem;
		font-weight: 400;
		line-height: 1.1;
		display: grid;
		grid-template-columns: 1em auto;
		gap: 0.5em;
	}
	.user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
	}
	.user-details .input-box{
    margin-bottom: 15px;
    margin: 20px 0 12px 0;
    width: calc(100% / 1 - 20px);
	}
	
		</style>
	<?php
	require_once('nav.php');
	?>

	<div class="container">
	<div id="image" onclick="closeImage()">
		<div class="img">
			<img src="userImages/demo.jpeg" alt="image">
		</div>
	</div>
		<!-- SIDEBAR -->
		<section id="sidebar">
		
		<ul class="side-menu top">
			<li>
				<a href="manage.php">
					<i class="fa-solid fa-user"></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="changepassword.php">
				<i class="fa-solid fa-key"></i>
					<span class="text">Change Password</span>
				</a>
			</li>
			<li>
				<a href="analytics.php">
					<i class="fa-solid fa-chart-simple"></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="message.php">
					<i class="fa-solid fa-message"></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="settings.php">
				<i class="fa-solid fa-gear"></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../logout.php" class="logout">
				<i class="fa-solid fa-right-from-bracket"></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
		
	</section>


	<!-- profile content -->
	<section id="content">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Change Password</h1>
					
				</div>
			</div>

			
            <ul class="box-info">
				<li>		
                <form action="" method="post">

                    <div class="user-details">
						
                        
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
						
                    </div>

                    <div class="input-box" id="chkBox">
                        <div class="left" >
                            <input type="checkbox" onclick="showHide()"><span id="hideShow"></span>
                        </div>
                        
                            
                    </div>
				
                    
                    <div class="button">
                        <input type="submit" onclick="userVerify()" value="Update">
                    </div>

					<!--error and success message alerts-->
					<div class="danger" id="danger">
						<p id="message"></p>
						<div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
					</div>
					<div class="success" id="success">
						<p id="successMsg"></p>
						<div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
					</div>
					<!--end of error and success message alerts-->

					


                </form>
				
				</li>
				
				
		
			</ul>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	
	<!-- CONTENT -->
	</div>
	<script>

		//Menu Script
		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

		allSideMenu.forEach(item=> {
			const li = item.parentElement;

			item.addEventListener('click', function () {
				allSideMenu.forEach(i=> {
					i.parentElement.classList.remove('active');
				})
				li.classList.add('active');
			})
		});

        



		//show and hide password

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




		//alert success unsuccess after password change
		document.getElementById("danger").style.display="none";
		document.getElementById("success").style.display="none";
		function closeBtn(){
			document.getElementById("danger").style.display="none";
			document.getElementById("success").style.display="none";
		}
		


		// TOGGLE SIDEBAR
		const menuBar = document.querySelector('#content nav .bx.bx-menu');
		const sidebar = document.getElementById('sidebar');

		menuBar.addEventListener('click', function () {
			sidebar.classList.toggle('hide');
		})
			


	</script>



	<?php
				if (!empty($_POST)) {
					$id = $userInfo['id'];
					$current_password = $_POST["current_password"];
					$new_password = $_POST["new_password"];
					$confirm_password = $_POST["confirm_password"];

					if (password_verify($current_password, $userInfo['password'])) {
						// Current password is correct
						
						if ($new_password !== $confirm_password) {
								echo'<script>';
								echo'document.getElementById("message").innerText="Confirm password doesnot matched.";';
								echo'document.getElementById("danger").style.display="inline-block";';
								echo'</script>';
							
						} else {
							// change the password
							$hashedPassword = password_hash($confirm_password, PASSWORD_DEFAULT);
							$query = "UPDATE tbl_users SET password='$hashedPassword' WHERE username='$username'";
							$result = mysqli_query($conn, $query);
							if($result){
								echo'<script>';
								echo'document.getElementById("successMsg").innerText="Password changed successfully.";';
								echo'document.getElementById("success").style.display="inline-block";';
								echo'</script>';
							}else{
								echo'<script>';
								echo'document.getElementById("message").innerText="Password cannot change.";';
								echo'document.getElementById("danger").style.display="inline-block";';
								echo'</script>';
							}
						   
						
						}
					} else {
						echo'<script>';
						echo'document.getElementById("message").innerText="Current password doesnot matched.";';
						echo'document.getElementById("danger").style.display="inline-block";';
						echo'</script>';
						exit;
					}
				}
	?>
	

	
	
	
</body>
</html>