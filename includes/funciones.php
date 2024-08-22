<?php

define ('TEMPLATES_URL', __DIR__ . '/templates');
define ('FUNCTIONS_URL', __DIR__ . 'funciones.php');
define ('IMAGES_FOLDER', $_SERVER['DOCUMENT_ROOT']. '/imagenes/');

function includeTemplates(string $name, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$name}.php";
}

function estaAutenticado() {
    session_start();

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    //Variable global con parametro login como TRUE en caso de iniciar la sesión -( Manera antes )-
    // $auth = $_SESSION['login'];

    if (!$_SESSION['login']){
        //Retorno de autenticación utilizado anteriormente dentro de la misma función.
        // return true;

        //Metodo optimizado para verificar que el usuario este autenticado, en caso de no estarlo, este será redireccionado hacia la página principal.
        header('Location: /');
    }

    //Retorno contrario a la autenticación utilizado anteriormente dentro de la misma función.
    // return false;
}

function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

//Función para sanitizar entradas de texto 
function s($html) : string {
    $sanitInp = htmlspecialchars($html ?? '');

    return $sanitInp;
}

//Función destinada a verificar si existe un valor dentro de un arreglo específico
function validateContentType($tipo) {
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

//Función para generar los mensajes de confirmación al crear, actualizar o eliminar vendedores y anuncios
function showNotifications($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1: $mensaje = "Creado correctamente";
            break;
        case 2: $mensaje = "Actualizado correctamente";
            break;
        case 3: $mensaje = "Eliminado correctamente";
            break;
        default: $mensaje = false;
            break;
    }

    return $mensaje;
}

function validOrRedir(string $url) {
     //Filtro para validar que el ID sea un entero
     $id = $_GET['id'];
     $id = filter_var($id, FILTER_VALIDATE_INT);
 
     if (!$id) {
        header("Location: {$url}");
     }

     return $id;
}