<?php
class UserAuthentication {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        session_start();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM tbl_users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                return true;
            }
        }
        return false;
    }

    public function isUserLoggedIn() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
    }
    public function redirectToLogin() {
        header('Location: ../index.php'); 
        exit();
    }
    

    public function validateUserLogin() {
        if (!$this->isUserLoggedIn()) {
            
        }
    }


    public function getUserInfo() {
        if ($this->isUserLoggedIn()) {
            $username = $_SESSION['username'];

            $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return false;
            }
        } else {
            return null;
        }
    }
}
?>