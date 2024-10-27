<?php
    include '../Model/database.php';  
    class readOperation{
        private $db;
        public function __construct() {
            $database = new Database();
            $db_response = $database->login();
    
            // Check if login was successful and assign the connection to $this->db
            if ($db_response === true) {
                $this->db = $database->DBconnect();
            } else {
                die('Database connection failed or invalid login.');
            }
        }

        public function bookList(){
            if($this->db instanceof PDO){
                $query = "SELECT * FROM book";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetchAll();
            } else {
                die('No valid database connection.');
            }
        }
    }
?>