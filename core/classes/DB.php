<?php
class DB{
    function connect(){
        $db = new PDO('mysql:host=127.0.0.1; dbname=fb-messenger', 'root','');
        return $db;
    }

}
