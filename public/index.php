<?php

require_once __DIR__ . "/../includes/app.php";

use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\SitesController;
use Controllers\LoginController;

$router = new Router();

//Zona privada
$router -> get('/admin', [PropertyController::class, 'index']);
$router -> get('/property/create', [PropertyController::class, 'create']);
$router -> post('/property/create', [PropertyController::class, 'create']);
$router -> get('/property/update', [PropertyController::class, 'update']);
$router -> post('/property/update', [PropertyController::class, 'update']);
$router -> post('/property/delete', [PropertyController::class, 'delete']);

$router -> get('/seller/create', [SellerController::class, 'create']);
$router -> post('/seller/create', [SellerController::class, 'create']);
$router -> get('/seller/update', [SellerController::class, 'update']);
$router -> post('/seller/update', [SellerController::class, 'update']);
$router -> post('/seller/delete', [SellerController::class, 'delete']);

//Zona publica
$router -> get('/', [SitesController::class, 'index']);
$router -> get('/about-us', [SitesController::class, 'aboutUs']);
$router -> get('/properties', [SitesController::class, 'properties']);
$router -> get('/property', [SitesController::class, 'property']);
$router -> get('/blogs', [SitesController::class, 'blogs']);
$router -> get('/blog', [SitesController::class, 'blog']);
$router -> get('/contact', [SitesController::class, 'contact']);
$router -> post('/contact', [SitesController::class, 'contact']);

// Iniciar Sesión y Autenticación
$router -> get('/login', [LoginController::class, 'login']);
$router -> post('/login', [LoginController::class, 'login']);
$router -> get('/logout', [LoginController::class, 'logout']);


$router -> comprobarRutas();