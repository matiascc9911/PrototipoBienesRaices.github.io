<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this -> rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this -> rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();

        $auth = $_SESSION['login'] ?? NULL;

        // Arreglo de rutas protegidas
        $protected_routes = ['/admin', '/property/create', '/property/update', '/property/delete', '/seller/create', '/seller/update', '/seller/delete'];

        if (isset($_SERVER['PATH_INFO'])) {
            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        } else {
            $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }

        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            $fn = $this -> rutasGET[$urlActual] ?? NULL;
        } else {
            $fn = $this -> rutasPOST[$urlActual] ?? NULL;
        }

        // Proteger las rutas
        if(in_array($urlActual, $protected_routes) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            //La URL existe siempre y cuando tenga una función asociada
            call_user_func($fn, $this);
        } else {
            echo "ERROR 404";
        }
    }

    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }

        //Almacenamiento temporal del bufer
        ob_start();

        //Este incluye de manera dinámica la página que se desea mostrar en pantalla
        include __DIR__ . "/view/$view.php";

        //Obtiene la información y la elimina de la memoria
        $contenido = ob_get_clean();

        //Incluye la Master Page
        include __DIR__ . "/view/layout.php";
    }
}
