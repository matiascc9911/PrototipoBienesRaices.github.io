<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;

use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;


class PropertyController {
    public static function index(Router $router) {

        $properties = Property :: all();

        $sellers = Seller :: all();

        $resultado = $_GET['resultado'] ?? NULL;

        $router->render("properties/admin", [
            'properties' => $properties,
            'resultado' => $resultado,
            'sellers' => $sellers
        ]);
    }

    public static function create(Router $router) {

        $property = new Property;
        $sellers = Seller :: all();
        $errors = Property :: getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $manager = new Image(Driver::class);
            
            // Crea una nueva instancia de la clase Properties
            $property = new Property($_POST['property']);
            
            //Realiza un resize a la imagen con Intervention(versión POO)
            if ($_FILES['property']['tmp_name']['imagen']) {
                // Generador de nombres para las imagenes
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";
                $image = $manager -> read($_FILES['property']['tmp_name']['imagen']);
                $image -> cover(800, 600);
                $property -> setImagen($nombreImagen);
                //Método de Intervention Image para guardar las imágenes en la BD.
                $image->save(IMAGES_FOLDER . $nombreImagen);
            } 
    
            //Método desde class Properties - Lanza errores cuando no se cumplen los requisitos en las entradas.
            $errors = $property->validar();
    
            //Esta condicional se ejecuta siempre que la variable $errores este vacía.
            if(empty($errors)){
                
                //Genera la carpeta para subir las imágenes
                if (!is_dir(IMAGES_FOLDER)) {
                    mkdir(IMAGES_FOLDER);
                }

                //Nuevo método para corroborar que se guardó correctamente la información del usuario.
                $property -> guardar();   
            }    
        }

        $router -> render("properties/create", [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors

        ]);
    }

    public static function update(Router $router) {

        $id = validOrRedir('/admin');
        $property = Property :: find($id);
        $errors = Property :: getErrores();
        $sellers = Seller :: all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $manager = new Image(Driver::class);

            //Asignación de los atributos (Versión POO)
            $args = $_POST['property'];
    
            $property -> sincronizar($args);

            //REUTILIZACIÓN DE MÉTODO-Lanza errores cuando no se cumplen los requisitos en las entradas( VP )
            $property -> validar();

            //Esta condicional se ejecuta siempre que la variable $errores este vacía.
            if(empty($errors)){
                //Realiza un resize a la imagen con Intervention(versión POO)
                if ($_FILES['property']['tmp_name']['imagen']) {
                    // Generador de nombres para las imagenes
                    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";
                    $image = $manager -> read($_FILES['property']['tmp_name']['imagen']);
                    $image -> cover(800, 600);
                    $property -> setImagen($nombreImagen);
                    //Método de Intervention Image para guardar las imágenes en la BD.
                    $image->save(IMAGES_FOLDER . $nombreImagen);
                } 
                //Método dentro del archivo Properties.php que contiene la condicional
                $property -> guardar();
            }
        }

        $router -> render("properties/update", [
            'property' => $property,
            'errors' => $errors,
            'sellers' => $sellers
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $type = $_POST['tipo'];
    
                if(validateContentType($type)){
                    //Consulta para encontrar un objeto que contenga un ID correctamente de la table en la BD. (Versión POO)
                    $property = Property::find($id);
                    
                    //llamada del método que elimina el elemento seleccionado mediante el ID
                    $property -> eliminar();
                }    
            }
        }
    }
}

