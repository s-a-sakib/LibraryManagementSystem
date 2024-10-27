<?php
class Database {
    private $Admin = 'root';
    private $AdminPass = '****';

    private $db;
    private bool $logedIn = false;
    private $MyUserName = 'army';
    private $MyPassword = 'abcdcbaX4321';
    private $jsonfile = 'userInfo.json';

    public function login() {
        // Read userInfo.json file and decode it into an array
        if (file_exists($this->jsonfile)) {
            $userInfo = json_decode(file_get_contents($this->jsonfile), true);
            $user = isset($userInfo['user']) ? $userInfo['user'] : '';
            $password = isset($userInfo['password']) ? $userInfo['password'] : '';
        } else {
            return 'User info not found.';
        }

        // Authenticate the user
        if ($password === $this->MyPassword && $user === $this->MyUserName) {
            try {
                // Establish the database connection
                $this->db = new PDO('mysql:host=127.0.0.1;dbname=bookstore', $this->Admin, $this->AdminPass);
                $this->logedIn = true;
                return true; // Successful login
            } catch (PDOException $e) {
                return 'Database connection failed.';
            }
        } else {
            return false; // Invalid credentials
        }
    }

    public function DBconnect(){
        if($this->logedIn == true){
            return $this->db;
        }else{
            return "Database connection failed";
        }
    }
}
?>
