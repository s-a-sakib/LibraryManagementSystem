<?php
class Database{
    private $Admin = 'root';
    private $AdminPass = '********************************';

    private $db;
    private bool $logedIn = false;
    private $MyUserName = 'army';
    private $MyPassword = '123456';
    private $username , $password;

    public function __construct($name, $pass){
        $this->username = $name;
        $this->password = $pass;
    }

    public function login() {
        if($this->username == $this->MyUserName && $this->password == $this->MyPassword){
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=bookstore', $this->Admin, $this->AdminPass);
            return true;
        }else{
            return false;
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
