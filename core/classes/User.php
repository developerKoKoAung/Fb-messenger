<?php
    class User{
        public $db, $userID;

        public function __construct(){
          $db = new DB;

          $this->db = $db->connect();
          $this->userID = $this->ID();
        }
        public function ID(){
            if($this->isLoggedIn()){
                return $_SESSION['user_id'];
            }
        }
        public function emailExist($email){
            $stmt = $this->db->prepare("SELECT * from `users` where `email` = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if(!empty($data)){
                return $data;
            }else{
                return false;
            }
        }
        public function hash($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }
        public function redirect($location){
            header("Location: ".BASE_URL.$location);
        }
        public function isLoggedIn(){
            return (($_SESSION['user_id']) ? true: false);
        }
    }