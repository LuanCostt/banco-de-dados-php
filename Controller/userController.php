<?php

namespace Controller;

use Model\User;
use Exception;

class UserController{
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }
    public function registerUser($user_fullname, $email, $password){
        try{
        }
    catch(Exception $error){
        echo "Erro ao cadastrar usuário: ".$error->getMessage();
        return false;
    }
    }
}

?>