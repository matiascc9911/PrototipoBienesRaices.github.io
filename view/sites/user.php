<?php
//Importar la conexión
require __DIR__ . '/../../includes/app.php';
$db = conectar_db();

//Generar variables con correo electrónico y clave de usuario
$email = "matias-carrillo9911@outlook.com";
$password = "1234567890";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Crear la consulta $query para aplicar en la BD
$query = "INSERT INTO users (email, password) VALUES ('{$email}', '{$passwordHash}')";

var_dump($query);

//Consultar en la BD
mysqli_query($db, $query);


?>