<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errors = $auth -> validar();

            if(empty($errors)) {
                // Verificar si el usuario existe en la BD
                $resultado = $auth -> userExists();

                if(!$resultado) {
                    $errors = Admin :: getErrores();
                } else {
                    // Verificar que la clave existe y está bien escrita
                    $authenticated = $auth -> checkPassword($resultado);

                    if($authenticated) {
                        // Autenticar el usuario 
                        $auth -> authenticate();
                    } else {
                        $errors = Admin :: getErrores();
                    }
                     
                }
                
            }
        }

        $router -> render('auth/login', [
            'errors' => $errors
        ]);

    }

    public static function logout(){
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}