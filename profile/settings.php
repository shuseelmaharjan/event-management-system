<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EMS | Message</title>
	<link rel="stylesheet" href="../css/main.css">
	<!--css for sidebar and container-->
	<link rel="stylesheet" href="css/style.css">

	<!--font awesome cdn-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
	<?php
	require_once('class/config.php');
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
			<li>
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
			<li class="active">
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
					<h1>Settings</h1>
					
				</div>
			</div>

			
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	
	<!-- CONTENT -->
	</div>
	<script>
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

		//IMAGE toggle
		function closeImage(){
			document.getElementById("image").style.display ="none";
		}
		function openImage(){
			document.getElementById("image").style.display="inline";
		}




			// TOGGLE SIDEBAR
			const menuBar = document.querySelector('#content nav .bx.bx-menu');
			const sidebar = document.getElementById('sidebar');

			menuBar.addEventListener('click', function () {
				sidebar.classList.toggle('hide');
			})











	</script>
	
</body>
</html>