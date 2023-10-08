<?php
class UserAuthentication {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        session_start();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM tbl_admin WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
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
        header('Location: login.php'); 
        exit();
    }
    

    public function validateUserLogin() {
        if (!$this->isUserLoggedIn()) {
            
        }
    }


    public function getUserInfo() {
        if ($this->isUserLoggedIn()) {
            $username = $_SESSION['username'];

            $sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
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



class SignupService {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function signup($username, $password) {
        // Check if the username is already taken
        if ($this->userRepository->getUserByUsername($username) !== null) {
            return false; 
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
    //for create
    public function insertBlogPost($title, $author, $publishDate, $publish_time, $description, $image) {
        $query = "INSERT INTO tbl_blog (post_title, author_name, publish_date, publish_time, description, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            die("Error in SQL query: " . $this->db->error);
        }
        $stmt->bind_param("ssssss", $title, $author, $publishDate, $publish_time, $description, $image);
    
        if ($stmt->execute()) {
            echo "Data inserted successfully";
            return true;
        } else {
            echo "Failed to insert data: " . $stmt->error;
            return false;
        }
    }
    

    //for read
    public function getAllBlogPosts() {
        $sql = "SELECT id, post_title, author_name, publish_date FROM tbl_blog";
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            return false; 
        }

        $blogPosts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $blogPosts[] = $row;
        }

        return $blogPosts;
    }

    //for update
    public function updateBlogPost($id, $title, $author, $publishDate, $description, $image) {
        if (!$this->db) {
            echo "Database connection is not established.";
            return false;
        }
    
        $query = "UPDATE tbl_blog SET post_title=?, author_name=?, publish_date=?, description=?, image=? WHERE id=?";
        $stmt = $this->db->prepare($query);
    
        if (!$stmt) {
            echo "Failed to prepare the SQL statement.";
            return false;
        }
    
        $stmt->bind_param("sssssi", $title, $author, $publishDate, $description, $image, $id);
    
        if ($stmt->execute()) {
            echo "Blog post updated successfully";
            return true;
        } else {
            echo "Failed to update blog post";
            return false;
        }
    }
    
    //for delete
    public function deleteBlogPost($id) {
        $query = "DELETE FROM tbl_blog WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo "Blog post deleted successfully";
            return true;
        } else {
            echo "Failed to delete blog post";
            return false;
        }
    }
    

}

class eventType{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    //data insertion
    public function insertType($name){
        $count = 0; 
        $checkQuery = "SELECT COUNT(*) FROM tbl_types WHERE name = ?";
        $checkStmt = $this->db->prepare($checkQuery);
        if(!$checkStmt){
            die("Error checking if Event Type already exists: " . $this->db->error);
        }
        $checkStmt->bind_param("s", $name);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();
    
        if ($count > 0) {
            echo "This name already exist";
            return false;
        } else {
            $insertQuery = "INSERT INTO tbl_types (name) VALUES(?)";
            $insertStmt = $this->db->prepare($insertQuery);
            if(!$insertStmt){
                die("data already on database");
            }
            $insertStmt->bind_param("s", $name);
            if($insertStmt->execute()){
                return true;
            }else{
                echo "data not inserted.";
                return false;
            }
        }
    }
    
    //read
    public function getallType(){
        $query = "SELECT * FROM tbl_types ORDER BY name ASC";
        $result = mysqli_query($this->db, $query);

        if(!$result){
            return false;
        }
        $getTypes = array();
        while($row = mysqli_fetch_assoc($result)){
            $getTypes[] = $row;
        }
        return $getTypes;

    }
    // Update
    public function updateType($typeID, $name){
        $count = 0;
        $checkQuery = "SELECT COUNT(*) FROM tbl_types WHERE name = ? AND type_id != ?";
        $checkStmt = $this->db->prepare($checkQuery);
        
        if(!$checkStmt){
            die("Error checking if Event Type already exists: " . $this->db->error);
        }
        
        $checkStmt->bind_param("si", $name, $typeID);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();
        
        if ($count > 0) {
            echo "This name already exists";
            return false;
        } else {
            $updateQuery = "UPDATE tbl_types SET name = ? WHERE type_id = ?";
            $updateStmt = $this->db->prepare($updateQuery);
            
            if(!$updateStmt){
                die("Error preparing update statement: " . $this->db->error);
            }
            
            $updateStmt->bind_param("si", $name, $typeID);
            
            if($updateStmt->execute()){
                return true;
            }else{
                echo "Data not updated";
                return false;
            }
        }
    }

    //delete
    public function deleteType($typeID){
        $query = "DELETE FROM tbl_types WHERE type_id = ?";
        $stmt = $this->db->prepare($query);
        
        if(!$stmt){
            die("Error preparing delete statement: ");
        }

        $stmt->bind_param("i", $typeID);

        if($stmt->execute()){
            return true;
            
        }else{
            echo "Data not deleted: ";
            return false; 
        }
    }
    
}
class event {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    // Data insertion
    public function insertEvent($eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName, $eventDays, $eventAddedDate, $eventAddedTime, $status){
        $stmt = $this->db->prepare("INSERT INTO tbl_events (eventName, dateofStart, dateofEnd, eventType, venue, eventOrganizer, description, image, event_days, adPostedDate, adPostedTime, ad_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName, $eventDays, $eventAddedDate, $eventAddedTime, $status);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //update
    public function updateEvent($eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName, $eventDays, $status, $id){
        if ($status == 'expired') {
            $expiredDate = date('Y-m-d');
            $query = "UPDATE tbl_events SET eventName=?, dateofStart=?, dateofEnd=?, eventType=?, venue=?, eventOrganizer=?, description=?, image=?, event_days=?, ad_status=?, ad_expired_date=? WHERE id=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssssssssssi", $eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName, $eventDays, $status, $expiredDate, $id);
            
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $stmt = $this->db->prepare("UPDATE tbl_events SET eventName=?, dateofStart=?, dateofEnd=?, eventType=?, venue=?, eventOrganizer=?, description=?, image=?, event_days=?, ad_status=? WHERE id=?");
            $stmt->bind_param("ssssssssssi", $eventName, $dateofStart, $dateofEnd, $eventType, $venue, $eventOrganizer, $description, $uniqueFileName, $eventDays, $status, $id);
    
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    //delete
    public function deleteEvent($id){
        $stmt = $this->db->prepare("DELETE FROM tbl_events WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
class service {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    // Data insertion
    public function insertService($serviceName, $eventType, $description, $uniqueFileName){
        $stmt = $this->db->prepare("INSERT INTO tbl_service (ser_name, type, description, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $serviceName, $eventType, $description, $uniqueFileName);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

//for package
class package{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    // data insertion
    // public function insertService($serviceId, $packageName, $packageCost, $packageGuest, $packageDescription){
    //     $stmt = $this->db->prepare("INSERT INTO tbl_package(pkg_name, pkg_cost, pkg_guest, pkg_descrition, service_id) VALUES (?, ?, ?, ?, ?)");
    //     $stmt->bind_param("sssss", $packageName, $packageCost, $packageGuest, $packageDescription, $serviceId);
    
    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function insertService($serviceId, $packageName, $packageCost, $packageGuest, $packageDescription){
        $stmt = $this->db->prepare("INSERT INTO tbl_packages(pkg_name, pkg_cost, pkg_guest, pkg_description, service_id) VALUES (?, ?, ?, ?, ?)");
    
        $stmt->bind_param("sssss", $packageName, $packageCost, $packageGuest, $packageDescription, $serviceId);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
?>

