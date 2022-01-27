<?php
    class User{
        public $db;

        public function __construct(){
          $db = new DB;

          $this->db = $db->connect();
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
    }