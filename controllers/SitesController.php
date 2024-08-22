<?php

namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

class SitesController {
    public static function index(Router $router){
        $properties = Property :: get(3);

        $homePage = True;

        $router -> render('sites/index', [
            'properties' => $properties,
            'homePage' => $homePage
        ]);
    }

    public static function AboutUs(Router $router){
        $router -> render('sites/aboutUs');
    }

    public static function properties(Router $router){
        
        $properties = Property::all();
        
        $router -> render('sites/properties', [
            'properties' => $properties
        ]);
    }

    public static function property(Router $router){
        $id = validOrRedir('/');
        $property = Property :: find($id);

        $router -> render('sites/property', [
            'property' => $property
        ]);
    }

    public static function blogs(Router $router){
        $router -> render('sites/blogs');
    }

    public static function blog(Router $router){
        $router -> render('sites/blog');
    }

    public static function contact(Router $router){

        $message = false;

        //Con esta condicional se genera y envia el mensaje una vez presionado el Submit
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $answer = $_POST['contact'];

            //Crear una instancia de PHPMailer
            $mail = new PHPMailer(True);

            //Configurar SMTP
            $mail -> isSMTP();

            $mail -> Host = 'sandbox.smtp.mailtrap.io';
            $mail -> SMTPAuth = True;
            $mail -> Username = '39d6762352e038';
            $mail -> Password = '27f0f08eaf7926';
            $mail ->SMTPSecure = 'tls';
            $mail -> Port = 465;

            //Configurar el contenido del Email
            $mail -> setFrom("admin@bienesraices.com");
            $mail -> addAddress("admin@bienesraices.com", "BienesRaices.com");
            $mail -> Subject = 'Nuevo Mensaje';

            //Habilitar HTML
            $mail -> isHTML(True);
            $mail -> CharSet = 'UTF-8';

            //Definir el contenido
            $content = '<html>';
            $content .= '<p> Tiene un Mensaje Nuevo </p>';
            $content .= '<p> Nombre: ' . $answer['nombre'] . ' </p>';

            // Esta condicional me va a indicar cuando el usuario seleccione una de estas dos opciones
            if($answer['contacto'] === 'telefono') {
                $content .= '<p> La opción seleccionada fué via Teléfono: </p>';
                $content .= '<p> Teléfono: ' . $answer['telefono'] . ' </p>';
                $content .= '<p> Fecha: ' . $answer['fecha'] . ' </p>';
                $content .= '<p> Hora: ' . $answer['hora'] . ' </p>';
            } else {
                $content .= '<p> La opción seleccionada fué via Email: </p>';
                $content .= '<p> Email: ' . $answer['email'] . ' </p>';
            }

            $content .= '<p> Mensaje: ' . $answer['mensaje'] . ' </p>';
            $content .= '<p> Vende o Compra: ' . $answer['tipo'] . ' </p>';
            $content .= '<p> Precio o Presupuesto: ' . $answer['cantidad'] . ' </p>';
            $content .= '<p> Prefiere contactarse mediante: ' . $answer['contacto'] . ' </p>';
            $content .= '</html>';
            

            $mail -> Body = $content;
            $mail -> AltBody = 'Texto Alternativo';

            //Enviar el Email
            if($mail -> send()) {
                $message = 'El correo fúe enviado con éxito';
            } else {
                $message = 'Error al enviar el correo...';
            }
        }
        $router -> render('sites/contact', [
            'message' => $message
        ]);
    }

}