<?php
// Assuming you have established a database connection

// Retrieve the submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the user exists
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);

// Check if the query was successful and if a matching user was found
if ($result && mysqli_num_rows($result) > 0) {
  $user = array("admin", "manager", "employee");
  
  // Verify the password
  if (password_verify($password, $user['password'])) {
    // Password is correct, so log in the user
    session_start();
    $_SESSION['user'] = $user;
    
    // Redirect the user to their respective role-specific page
    if ($user['role'] == 'admin') {
      header("Location: admin.php");
    } elseif ($user['role'] == 'manager') {
      header("Location: manager.php");
    } elseif ($user['role'] == 'employee') {
      header("Location: employee.php");
    }
    
    exit();
  }
}

// If the login fails, redirect back to the login form with an error message
header("Location: login.html?error=1");
exit();
?>

<blockquote>
    <form action="">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</blockquote>
