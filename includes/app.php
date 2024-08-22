<?php

//Llamada a las funciones, las clases y la base de datos sólo desde un documento
require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";

//Invocación de la función que contiene la conexión con la BD desde database.php
$db = conectar_db();

//Invocación de la clase padre ActiveRecord
use Model\ActiveRecord;

//Exportación de la BD mediante la clase ActiveRecord
ActiveRecord::setDB($db);

