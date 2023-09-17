<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EMS | Manage Profile</title>
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
<!--start of update kyc form user-->
<div class="popup" id="popupForm">
<div class="wrapper">
<span id="closeFormBtn" class="close-button"><i class="fa-solid fa-xmark"></i></span>
	<!-- <h1>Update Profile</h1> -->
	<div class="form-style-5">
		<!--update php code-->
		
		

		
		<form action="class/updateinfo.php" method="post">
			
		<legend><span class="number">1</span> User Info</legend>
		<div class="user-details">
			<div class="input-box">
                    <span class="details">Full Name:</span>
                    <input type="text" name="name" placeholder="Your Full Name" value="<?php echo($userInfo['name']); ?>" required>
            </div>
            <div class="input-box">
                    <span class="details">Your Email:</span>
                    <input type="email" name="email" placeholder="Your Email" value="<?php echo($userInfo['email']); ?>" required>
            </div>
			<div class="input-box">
                    <span class="details">Phone:</span>
                    <input type="number" name="phone" placeholder="Phone Number" value="<?php echo($userInfo['phone']); ?>" required>
            </div>
            <div class="input-box">
                    <span class="details">Username:</span>
                    <input type="text" name="username" placeholder="<?php echo($userInfo['username']); ?>" readonly>
            </div>
			<div class="input-box">
                    <span class="details">Date of Birth:</span>
                    <input type="date" name="dob" value="<?php echo($userInfo['dob']); ?>"  required>
            </div>
			<div class="input-box">
                    <span class="details">Gender:</span>
                    <div id="genders">
                        <input type="radio" value="male" name="gender" <?php if($userInfo['gender']=="male"){ echo "checked";}?> required>Male
                        <input type="radio" value="female" name="gender" <?php if($userInfo['gender']=="female"){ echo "checked";}?>>Female
                        <input type="radio" value="other" name="gender" <?php if($userInfo['gender']=="other"){ echo "checked";}?>>Other
                    </div>
                    
                </div>

				<div class="input-box">
                    <span class="details">Father's Name:</span>
                    <input type="text" name="fatherName" placeholder="Father's Name" value="<?php echo !empty($userInfo['fatherName']) ? $userInfo['fatherName'] : 'N/A'; ?>">
            </div>
			<div class="input-box">
                    <span class="details">Mother's Name:</span>
                    <input type="text" name="motherName" placeholder="Mother's Name" value="<?php echo !empty($userInfo['motherName']) ? $userInfo['motherName'] : 'N/A'; ?>">
            </div>
			<div class="input-box">
                    <span class="details">Temporary Address:</span>
                    <input type="text" name="tmpAddress" placeholder="Temporary Address" value="<?php echo !empty($userInfo['tmpAddress']) ? $userInfo['tmpAddress'] : 'N/A'; ?>">
            </div>
			<div class="input-box">
                    <span class="details">Permanent Address:</span>
                    <input type="text" name="perAddress" placeholder="Permanent Address" value="<?php echo !empty($userInfo['perAddress']) ? $userInfo['perAddress'] : 'N/A'; ?>">
            </div>
			
			
		</div>
		<div class="buttons">
		<div class="button">
                <input type="submit" value="Update">
            </div>
			
		</div>
		
		
		</form>
	</div>
</div>
</div>
<!--end of popup update kyc form user-->

<div class="popup" id="popUpimg">
<div class="wrapper" id="imgWarpper">
<span id="closeImgFormBtn" class="close-button"><i class="fa-solid fa-xmark"></i></span>
	<div class="form-style-5">
	<legend><span class="number">2</span> Update Image</legend>
	<input type="file" id="file" accept="image/*" hidden>
		<div class="img-area" data-img="">
			<div class="icon">
			<i class="fa-solid fa-cloud-arrow-up"></i>	
			</div>
			<h3>Upload Image</h3>
			<button class="select-image">Choose Image</button>
		</div>
		
		<button class="select-image">Upload</button>
	</div>
</div>
</div>



<div id="image" onclick="closeImage()">
		<div class="img" onclick="openImage()">
			<img src="userImages/demo.jpeg" alt="image">
		</div>
	</div>
	<?php
	require_once('nav.php');
	
	?>
	<div class="container">
	
		<!-- SIDEBAR -->
		<section id="sidebar">
		
		<ul class="side-menu top">
			<li class="active">
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
					<h1>Manage Profile</h1>
					
				</div>
			</div>

			<ul class="box-info">
				<li>
					<img onclick="openImage()" src="userImages/demo.jpeg" alt="profile">
					<span class="text" id="userData">
						<h3><?php echo !empty($userInfo['name']) ? $userInfo['name'] : 'N/A'; ?></h3>
						<span><h4>Username:</h4><?php echo !empty($userInfo['username']) ? $userInfo['username'] : 'N/A'; ?></span>
						<span><h4>Email:</h4><?php echo !empty($userInfo['email']) ? $userInfo['email'] : 'N/A'; ?></span>
						<span><h4>Phone:</h4><?php echo !empty($userInfo['phone']) ? $userInfo['phone'] : 'N/A'; ?></span>
						<span><h4>Joined Data:</h4><?php echo !empty($userInfo['dateofjoin']) ? $userInfo['dateofjoin'] : 'N/A'; ?></span>
					</span>

					<span class="btn" id="change-btn">
						<div class="box">

							<div class="boxBtn">
								<button id="showFormBtn">Update KYC</button>
							</div>

							<div class="boxBtn">
								<button id="showFormPic">Update Picture</button>
							</div>
						</div>
						
					</span>

				</li>	
		
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Profile Details</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Date of Birth</th>
								<th>Gender</th>
								<th>Father's Name</th>
								<th>Mother's Name</th>
								<th>Temporary Address</th>
								<th>Permanent Address</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td><?php echo !empty($userInfo['dob']) ? $userInfo['dob'] : 'N/A'; ?></td>
								<td><?php echo !empty($userInfo['gender']) ? $userInfo['gender'] : 'N/A'; ?></td>
								<td><?php echo !empty($userInfo['fatherName']) ? $userInfo['fatherName'] : 'N/A'; ?></td>
								<td><?php echo !empty($userInfo['motherName']) ? $userInfo['motherName'] : 'N/A'; ?></td>
								<td><?php echo !empty($userInfo['tmpAddress']) ? $userInfo['tmpAddress'] : 'N/A'; ?></td>
								<td><?php echo !empty($userInfo['perAddress']) ? $userInfo['perAddress'] : 'N/A'; ?></td>
								
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>


	
	<!-- CONTENT -->
	
	</div>
	
	<script>

		const showFormBtn = document.getElementById("showFormBtn");
		const closeFormBtn = document.getElementById("closeFormBtn");
		const popupForm = document.getElementById("popupForm");

		const showFormPic = document.getElementById("showFormPic");
		const closeImgFormBtn = document.getElementById("closeImgFormBtn");
		const popUpimg = document.getElementById("popUpimg");

		// Function to show the profile update form
		function showForm() {
			popupForm.style.display = "block";
		}

		// Function to close the profile update form
		function closeForm() {
			popupForm.style.display = "none";
		}

		// Function to show the image upload form
		function uploadImg() {
			popUpimg.style.display = "block";
		}

		// Function to close the image upload form
		function closeImgForm() {
			popUpimg.style.display = "none";
		}

		// Event listeners
		showFormBtn.addEventListener("click", showForm);
		closeFormBtn.addEventListener("click", closeForm);

		showFormPic.addEventListener("click", uploadImg);
		closeImgFormBtn.addEventListener("click", closeImgForm);

		
	

		//image upload
		const selectImage = document.querySelector('.select-image');
		const inputFile = document.querySelector('#file');
		const imgArea = document.querySelector('.img-area');

		selectImage.addEventListener('click', function () {
			inputFile.click();
		})

		inputFile.addEventListener('change', function () {
			const image = this.files[0]
			if(image.size < 2000000) {
				const reader = new FileReader();
				reader.onload = ()=> {
					const allImg = imgArea.querySelectorAll('img');
					allImg.forEach(item=> item.remove());
					const imgUrl = reader.result;
					const img = document.createElement('img');
					img.src = imgUrl;
					imgArea.appendChild(img);
					imgArea.classList.add('active');
					imgArea.dataset.img = image.name;
				}
				reader.readAsDataURL(image);
			} else {
				alert("Image size more than 2MB");
			}
		})

		function closeUpdate(){
					document.getElementById("popupUpdate").style.display="none";
				}
				function updateProfile(){
					document.getElementById("popupUpdate").style.display="inline";
				}


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