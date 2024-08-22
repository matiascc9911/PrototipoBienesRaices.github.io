<?php

namespace Model;

class Admin extends ActiveRecord {
    // Base de Datos
    protected static $tabla = 'users';
    protected static $columnasDB = ['email', 'password', 'id'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? Null;
        $this -> email = $args['email'] ?? '';
        $this -> password = $args['password'] ?? '';
    }

    public function validar() {
        if(!$this -> email) {
            self :: $errors[] = 'El email es obligatorio';
        }
        if(!$this -> password) {
            self :: $errors[] = 'El password es obligatorio';
        }

        return self :: $errors;
    }

    public function userExists() {
        // Revisar si un usuario existe en la BD
        $query = "SELECT * FROM " . self :: $tabla . " WHERE email = '" . $this -> email . "' LIMIT 1";
        // Conectar la consulta con la BD
        $resultado = self :: $db -> query($query);
        // Ejecución de codigo en ambos casos (Existe o no el usuario)
        if(!$resultado -> num_rows) {
            self :: $errors[] = 'El usuario no existe';
            return;
        }

        return $resultado;
    }

    public function checkPassword($resultado) {
        $user = $resultado -> fetch_object();
        $authenticated = password_verify($this->password, $user->password);

        if(!$authenticated) {
            self :: $errors[] = "El password es Incorrecto";
        }
        return $authenticated;
    }

    public function authenticate() {
        session_start();

        // Llenar el arreglo de la Sesión
        $_SESSION['user'] = $this -> email;
        $_SESSION['login'] = True;

        header('Location: /admin');
    }
}