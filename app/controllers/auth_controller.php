<?php

require_once './app/views/general_view.php';
require_once './app/models/users_model.php';



class AuthController {
    private $general_view;
    private $user_model;
    
    public function __construct() {
        $this->user_model = new UserModel();
        $this->general_view = new GeneralView();
    }

    public function showFormLogin() {
        $this->general_view->showFormLogin();
    }

    public function validateUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->user_model->getUserByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;


            header("Location: " . BASE_URL);

        } else {
           
           $this->general_view->showFormLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
