<?php

class UserModel {
    private $db_user;
    
    public function __construct() {
        $this->db_user = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    public function getUserByEmail($email) {
        $query = $this->db_user->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }


}