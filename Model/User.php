<?php

namespace Model;

use Model\Connection;

use PDO;
use PDOException;

class User {
    private $db;

    /**
     * Metodo que ira ser executado toda vez que
     * for criado de um objeto de classe -> USER
     */
    public function __construct() {
        $this->db = Connection::getInstance();
    }
    public function registerUser($user_fullname,$email,$password) {
        try{

            $sql = 'INSERT INTO user, (user_fullname, email, password, created_at) VALUES(:user_fullname, :email, :password, NOW())';


            $stwt = $this->db->prepare($sql);

            $stwt->bindParam(":user_fullname", $user_fullname, PDO::PARAM_STR);


        } catch(PDOException $error) {}
    }
}

?>