<?php 
    class database{
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='eventmgmt';
        private $mysqli = "";
        private $result = array();
        private $conn = false;

        public function __construct(){
            // $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if(!$this->conn){
                $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
                $this->conn = true;
                if($this->mysqli->connect_error){
                    array_push($this->result, $this->mysqli->connect_error);
                    return false;
                }else{
                    return true;
                }
            }
        }

     //funciton to insert data
     public function isnert($table, $params=array()){
        if($this->tableExits($table)){
            $table_columns = implode(',', array_keys($params));
            $table_value = implode("','", $params);

            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->insert_id);
                return true; //Data has ben inserted
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false; //Table doesnot exist
        }
     }
//function to update row in table

        public function update($table,$para=array(), $where = null){
            if($this->tableExists($table)){
                $args = array();
                foreach ($params as $key => $value){
                    $args[] = "$key = '$value'";
                }
                $sql = "UPDATE $table SET".implode(',',$args);
                if($where != null){
                    $sql .="Where $where";
                }
                if($this->mysqli->query($sql)){
                    array_push($this->result, $this->mysqli->affected_rows);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                    return false;

                }
                
            }else{
                return false;
            }
           
        }

        //function to delete table from database
        public function delete($table, $where=null){
            if($this->tableExists($table)){
                $sql ="DELETE FROM `$table` ";
                if($where != null){
                    $sql .="WHERE $where";
                }
                if($this->mysqli->query($sql)){
                    array_push($this->result, $this->mysqli->affected_rows);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                    return false;

                }

            }else{
                return false;
            }
        }

        public $sql;

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function __destruct(){
            $this->mysqli->close();
        }
    }
?>