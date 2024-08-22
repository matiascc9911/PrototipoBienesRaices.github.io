<?php

// //IDENTIFICANDO LOS ERRORES - Se utiliza solamente para casos especiales
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

function conectar_db() : mysqli {
$db = new mysqli('localhost', 'root', '-MCc23root11611', 'bienesraices_crud');

if (!$db) {
    echo "Error - No se conectó correctamente a la Base de Datos";
    exit;
}

return $db;

}