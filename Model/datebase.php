<?php
    class database{
        private $Admin = 'root';
        private $AdminPass = '2002732360600003';

        private $db;
        private $MyUserName = 'bonkarmy';
        private $MyPassword = 'abcdcbaX4321';
        private $jsonfile = 'userInfo.json';

        public function login(){
            $userInfo = json_decode($this->jsonfile, true);
            $user = $userInfo->user;
            $password = $userInfo->password;

            if($password == $this->MyPassword and $user == $this->MyUserName){
                $this->db = new PDO('mysql:host=127.0.0.1;dbname=bookstore',$this->Admin,$this->AdminPass);
            }else{
                return 'Wrong username or password';
            }
        }
    }
?>
