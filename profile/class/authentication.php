<?php
class UserAuthentication {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        session_start();
    }

    public function isUserLoggedIn() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
    }

    public function redirectToLogin() {
        header('Location: ../login.php'); // Replace 'login.php' with your login page URL
        exit();
    }

    public function validateUserLogin() {
        if (!$this->isUserLoggedIn()) {
            $this->redirectToLogin();
        }
    }

    public function getUserInfo() {
        if ($this->isUserLoggedIn()) {
            // Fetch user information from the database based on the logged-in user's credentials
            $username = $_SESSION['username'];
            // Perform a database query to get user data
            $sql = "SELECT * FROM tbl_users WHERE username='$username'";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return false;
            }

            // if ($result && mysqli_num_rows($result) == 1) {
            //     return mysqli_fetch_assoc($result);
            // }
        }
        return null;
    }
    //update password
    public function changePassword($currentPassword, $newPassword, $confirmPassword) {
        if ($this->isUserLoggedIn()) {
            // Get the logged-in user's username
            $username = $_SESSION['username'];

            // Check if the provided current password is correct
            $sql = "SELECT password FROM tbl_users WHERE username='$username'";
            $result = mysqli_query($this->conn, $sql);

            if ($result && mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if (password_verify($currentPassword, $hashedPassword)) {
                    // Current password is correct, now validate the new password
                    if ($newPassword === $confirmPassword) {
                        // New password and confirm password match, proceed to update the password
                        $newHashedPassword = md5($newPassword);
                        $updateSql = "UPDATE tbl_users SET password='$newHashedPassword' WHERE username='$username'";
                        
                        if (mysqli_query($this->conn, $updateSql)) {
                            return "Password updated successfully!";
                        } else {
                            return "Error updating password: " . mysqli_error($this->conn);
                        }
                    } else {
                        return "New password and confirm password do not match.";
                    }
                } else {
                    return "Current password is incorrect.";
                }
            } else {
                return "Error fetching user data: " . mysqli_error($this->conn);
            }
        } else {
            return "User is not logged in.";
        }
    }
}


?>
