<?php
require_once('../php/connection.php');

require_once('php/authentication.php');

// Create instances of the UserRepository and SignupService classes
$userRepository = new UserRepository($conn);
$signupService = new SignupService($userRepository);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST['password'];

    // Attempt to register the user
    $registrationResult = $signupService->signup($username, $password);

    if ($registrationResult === true) {
        // Redirect to a success page or login page
        header('Location: login.php');
        exit();
    } else {
        // Display an error message if registration fails
        echo "Registration failed. Please choose a different username.";
    }
}
?>
<!-- Your HTML signup form goes here -->

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
