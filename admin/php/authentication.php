<?php
class User {
    private $id;
    private $username;
    private $password;

    public function __construct($id, $username, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    public static function isLoggedIn() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
    }
}


class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByUsername($username) {
        $query = "SELECT id, username, password FROM tbl_admin WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return new User($row['id'], $row['username'], $row['password']);
        } else {
            return null;
        }
    }
    public function insertUser($username, $password) {
        $query = "INSERT INTO tbl_admin (username, password) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        
        return $stmt->execute();
    }
    
}


class LoginService {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password) {
        // Get user data by username
        $user = $this->userRepository->getUserByUsername($username);

        if ($user !== null) {
            // Verify the provided password against the stored password
            if (password_verify($password, $user->getPassword())) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                return true; // Login successful
            }
        }

        return false; // Login failed
    }
}


class SignupService {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function signup($username, $password) {
        // Check if the username is already taken
        if ($this->userRepository->getUserByUsername($username) !== null) {
            return false; // Username is already in use
        }

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        return $this->userRepository->insertUser($username, $hashedPassword);
    }
}

class BlogPost {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertBlogPost($title, $author, $publishDate, $description, $image) {
        $query = "INSERT INTO tbl_blog (post_title, author_name, publish_date, description, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $title, $author, $publishDate, $description, $image);

        if ($stmt->execute()) {
            echo("data inserted sueecssfully");
            return true; 
        } else {
            echo("failed to insert");
            return false;
        }
    }
}

?>