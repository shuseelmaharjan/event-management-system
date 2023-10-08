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
	<style>
	
	</style>
	<?php
		require_once('class/config.php');
	?>
	<!---------------------------------
	###################################
		popup success error msg
	###################################
	---------------------------------->
	<div class="alertMessages" id="alertMsg">
		<div class="danger" id="danger">
			<p id="message"></p>
			<div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
		</div>
		<div class="success" id="success">
			<p id="successMsg"></p>
			<div class="close" onclick="closeBtn()"><i class="fa-solid fa-xmark"></i></div>
		</div>
	</div>
	
	<!---------------------------------
	###################################
		end of popup success msg
	###################################
	---------------------------------->

	<!--------------------------------------------------->


	<!---------------------------------
	###################################
		start of popup info update
	###################################
	---------------------------------->

	<div class="popup" id="popupForm">
		<div class="wrapper">

			<span id="closeFormBtn" class="close-button"><i class="fa-solid fa-xmark"></i></span>
			
			<div class="form-style-5">
				<!--update php code-->	
				<form action="" method="post">
					
				<legend><span class="number">1</span> User Info</legend>

				<div class="user-details">
					<div class="input-box">
						<span class="details">Full Name:</span>
						<input type="text" name="name" placeholder="Your Full Name" value="<?php echo($userInfo['name']); ?>" required>
					</div>
					<div class="input-box">
						<span class="details">Your Email:</span>
						<input type="email" name="email" placeholder="Your Email" value="<?php echo($userInfo['email']); ?>" readonly>
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
						<input type="submit" value="Update" name="submit">
					</div>
				</div>

				</form>
			</div>
		</div>
	</div>
	<!---------------------------------
	###################################
		End of popup info update
	###################################
	---------------------------------->



	<!--------------------------------------------------->

	<!---------------------------------
	###################################
		start of popup image Upload
	###################################
	---------------------------------->

	<div class="popup" id="popUpimg">
		<div class="wrapper" id="imgWarpper">
			<span id="closeImgFormBtn" class="close-button"><i class="fa-solid fa-xmark"></i></span>
			<div class="form-style-5">
				<legend><span class="number">2</span> Update Image</legend>
				<form action="" method="post" enctype="multipart/form-data">
					<label for="file">Select a file:</label>
					<input type="file" name="file" id="file">
					<input type="submit" value="Upload" name="uploadImg">
				</form>
			
			</div>
		</div>
	</div>

	<!---------------------------------
	###################################
		end of popup image upload	
	###################################
	---------------------------------->


	<!--------------------------------------------------->


	<!---------------------------------
	###################################
		Start of full screen image view
	###################################
	---------------------------------->
	<div id="image" onclick="closeImage()">
		<div class="img" onclick="openImage()">
			<div class="cover">
				<img src="<?php echo $userInfo["image"];?>" alt="Image">
			</div>
		</div>
	</div>
	<!---------------------------------
	###################################
		end of full screen image popup view
	###################################
	---------------------------------->



	<!--------------------------------------------------->

	<?php
		require_once('nav.php');
	
	?>

	<!--------------------------------------------------->

	<div class="container">
	
		<!---------
		######################
			start of side bar
		######################
		----------->
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
					<a href="../logout.php" class="logout">
						<i class="fa-solid fa-right-from-bracket"></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		</section>
		<!---------
		######################
			end of side bar
		######################
		----------->
	

		<!---------
		######################
			Start of main content
		######################
		----------->
		<section id="content">
			<!-- MAIN -->
			<main>
				<div class="head-title">
					<div class="left">
						<h1>Manage Profile</h1>
					</div>
				</div>

				<!--start of row1-->
				<ul class="box-info">
					<li>
					<?php
						if (!empty($userInfo["image"]) ) {
							?>
							<div class="exist">
								<img onclick="openImage()" src="<?php echo($userInfo["image"]);?>" alt="profile">
							</div>
							<?php
						} else {
							?>
							<div class="default">
								<img src="uploads/default.png"  alt="default img">
							</div>
							<?php
						}
					?>

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
									<button id="showFormBtn">Update Personal Info</button>
								</div>

								<div class="boxBtn">
									<button id="showFormPic">Update Picture</button>
								</div>
							</div>
							
						</span>

					</li>	
			
				</ul>
				<!--end of row1-->

				<!--start of row 2-->
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
				<!--end of row2 -->
			</main>
			<!-- MAIN -->
		</section>
		<!---------
		######################
			end of main content
		######################
		----------->
	
	
	</div>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
		// Validate and sanitize POST data
		$id = $userInfo['id'];
		$name = ($_POST["name"] == 'N/A') ? '' : $_POST["name"];
		$phone = ($_POST["phone"] == 'N/A') ? '' : $_POST["phone"];
		$dob = ($_POST["dob"] == 'N/A') ? '' : $_POST["dob"];
		$gender = ($_POST["gender"] == 'N/A') ? '' : $_POST["gender"];
		$fatherName = ($_POST["fatherName"] == 'N/A') ? '' : $_POST["fatherName"];
		$motherName = ($_POST["motherName"] == 'N/A') ? '' : $_POST["motherName"];
		$tmpAddress = ($_POST["tmpAddress"] == 'N/A') ? '' : $_POST["tmpAddress"];
		$perAddress = ($_POST["perAddress"] == 'N/A') ? '' : $_POST["perAddress"];


		// You need to set $username based on the user's session or form input

		// Assuming you have already established a database connection ($conn)
		// Define your $username here based on the user's session or form input
		$username = $userInfo['username'];
		// Prepare the SQL update query
		$query = "UPDATE tbl_users SET
			name = '$name',
			phone = '$phone',
			dob = '$dob',
			gender = '$gender',
			fatherName = '$fatherName',
			motherName = '$motherName',
			tmpAddress = '$tmpAddress',
			perAddress = '$perAddress'
			WHERE username = '$username'";

		// Execute the query
		$result = mysqli_query($conn, $query);

		if ($result) {
			echo '<script>';
			echo 'document.getElementById("successMsg").innerText = "Data updated successfully.";';
			echo 'document.getElementById("success").style.display = "inline-block";';
			echo 'setTimeout(function() {';
			echo '  document.getElementById("success").style.display = "none";'; 
			echo '}, 5000);';
			echo 'setTimeout(function() {';
			echo '  window.location.replace(window.location.href);';
			echo '}, 1000);';
			echo '</script>';
			exit(); 
			
		} else {
			echo '<script>';
			echo 'document.getElementById("message").innerText = "Failed to update data.";';
			echo 'document.getElementById("success").style.display = "inline-block";';
			echo 'setTimeout(function() {';
			echo '  window.location.replace(window.location.href);'; 
			echo '}, 3000);'; 
			echo '</script>';
			exit();
		}
	}
	
	//image upload
	if (isset($_POST["uploadImg"])) {
		  // Assuming you have a variable containing the unique identifier for the user or record to update
		  $user_id = $userInfo["id"]; // Change this to the actual user ID or identifier
    
		  $target_dir = "uploads/";
		  $original_file_name = basename($_FILES["file"]["name"]);
		  $imageFileType = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
	  
		  // Generate a unique filename
		  $unique_filename = generateUniqueFileName($imageFileType);
	  
		  $target_file = $target_dir . $unique_filename;
		  $uploadOk = 1;
	  
		  // Check if image file is a valid image
		  $check = getimagesize($_FILES["file"]["tmp_name"]);
		  if ($check !== false) {
			  echo "File is an image - " . $check["mime"] . ".";
			  $uploadOk = 1;
		  } else {
			echo '<script>';
			echo 'document.getElementById("message").innerText = "File is not an image.";';
			echo 'document.getElementById("success").style.display = "inline-block";';
			echo 'setTimeout(function() {';
			echo '  window.location.replace(window.location.href);'; 
			echo '}, 3000);'; 
			echo '</script>';
			  $uploadOk = 0;
			  exit();
		  }
	  
		  // Allow certain file formats
		  $allowed_image_types = ["jpg", "jpeg", "png", "gif"];
		  if (!in_array($imageFileType, $allowed_image_types)) {
			echo '<script>';
			echo 'document.getElementById("message").innerText = "Sorry, only JPG, JPEG, PNG 7 GIF files are allowed.";';
			echo 'document.getElementById("success").style.display = "inline-block";';
			echo 'setTimeout(function() {';
			echo '  window.location.replace(window.location.href);'; 
			echo '}, 3000);'; 
			echo '</script>';
			  $uploadOk = 0;
			  exit();
		  }
	  
		  // Check if $uploadOk is set to 0 by an error
		  if ($uploadOk == 0) {
				echo '<script>';
				echo 'document.getElementById("message").innerText = "Failed to upload file.";';
				echo 'document.getElementById("success").style.display = "inline-block";';
				echo 'setTimeout(function() {';
				echo '  window.location.replace(window.location.href);'; 
				echo '}, 3000);'; 
				echo '</script>';
				exit();
		  } else {
			  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				  // Update the image path in the database for the specified user or record
				  $imagePath = $target_file;
				  $updateQuery = "UPDATE tbl_users SET image = ? WHERE id = ?";
				  $stmt = $conn->prepare($updateQuery);
				  $stmt->bind_param("si", $imagePath, $user_id); // 'i' for integer, assuming id is an integer
	  
				  if ($stmt->execute()) {
					echo '<script>';
					echo 'document.getElementById("successMsg").innerText = "Image updated successfully.";';
					echo 'document.getElementById("success").style.display = "inline-block";';
					echo 'setTimeout(function() {';
					echo '  document.getElementById("success").style.display = "none";'; 
					echo '}, 5000);';
					echo 'setTimeout(function() {';
					echo '  window.location.replace(window.location.href);';
					echo '}, 1000);';
					echo '</script>';
					exit(); 
					//   echo "The file " . $original_file_name . " has been uploaded with a unique name: " . $unique_filename . " and updated in the database.";
				  } else {
					echo '<script>';
					echo 'document.getElementById("message").innerText = "Error updating image.";';
					echo 'document.getElementById("success").style.display = "inline-block";';
					echo 'setTimeout(function() {';
					echo '  window.location.replace(window.location.href);'; 
					echo '}, 3000);'; 
					echo '</script>';
							

					//   echo "Error updating data in the database.";
				  }
				  $stmt->close();
			  } else {
				echo '<script>';
				echo 'document.getElementById("message").innerText = "Sorry, there was an error uploading this file.";';
				echo 'document.getElementById("success").style.display = "inline-block";';
				echo 'setTimeout(function() {';
				echo '  window.location.replace(window.location.href);'; 
				echo '}, 3000);'; 
				echo '</script>';
				exit();
				//   echo "Sorry, there was an error uploading your file.";
			  }
		  }
	  }
	  
	  // Function to generate a unique filename
	  function generateUniqueFileName($extension) {
		  $timestamp = time();
		  $random_string = bin2hex(random_bytes(6));
		  return $timestamp . "_" . $random_string . "." . $extension;
	  }
	?>
	
	
	
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

		function fetchImage() {
			// Get a reference to the img element
			var imgElement = document.getElementById("userImage");

			// Make an AJAX request to fetch the image path
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);

					// Set the src attribute of the img element
					imgElement.src = response.imagePath;
				}
			};

			// Replace 'fetch_image.php' with the actual path to your PHP script
			xhr.open("GET", "fetch_image.php", true);
			xhr.send();
		}

		// Call the fetchImage function when the page loads to display the image
		fetchImage();

	

		//image upload
	
		const selectImage = document.querySelector('.select-image');
		const inputFile = document.querySelector('#file');
		const imgArea = document.querySelector('.img-area');

		selectImage.addEventListener('click', function () {
			inputFile.click();
		})
		function openFileInput() {
            // Trigger a click event on the hidden file input
            var fileInput = document.getElementById("file");
            fileInput.click();
        }
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
			document.getElementById("image").style.display="flex";
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