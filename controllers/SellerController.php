<?php

namespace Controllers;

use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create(Router $router) {

        $seller = new Seller;
        $errors = Seller :: getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $seller = new Seller($_POST['seller']);

            //Método desde class Properties - Lanza errores cuando no se cumplen los requisitos en las entradas.
            $errors = $seller->validar();
    
            //Esta condicional se ejecuta siempre que la variable $errores este vacía.
            if(empty($errors)){
                //Nuevo método para corroborar que se guardó correctamente la información del usuario.
                $seller -> guardar();   
            }    
        }

        $router -> render("sellers/create", [
            'seller' => $seller,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router) {
        
        $id = validOrRedir('/admin');
        $seller = Seller :: find($id);
        $errors = Seller :: getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['seller'];

            $seller -> sincronizar($args);

            $seller -> validar();

            if(empty($errors)){
                $seller -> guardar();
            }

        }
        $router -> render("sellers/update", [
            'errors' => $errors,
            'seller' => $seller
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Validar ID 
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                // Validar el tipo de registro que se requiere eliminar
                $type = $_POST['tipo'];

                if(validateContentType($type)) {
                    // Consulta para encontrar un objeto que contenga un ID correctamente de la tabla en la BD.
                    $seller = Seller :: find($id);

                    //Llamada del metodo que elimina el elemento seleccionado mediante el ID 
                    $seller -> eliminar();
                }
            }
        }
    }
}