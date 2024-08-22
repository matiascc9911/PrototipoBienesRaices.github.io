<?php

    //isset() se encarga de determinar si una variable es NULL o no 
    if (!isset($_SESSION)) {
        session_start();
    }

    // Si la variable no es TRUE entonces es FALSE
    $auth = $_SESSION['login'] ?? false;

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" class="logo-header">
                </a>

                <div class="right-side">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="icono de modo oscuro">
    
                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="icono menu responsive">
                    </div>
                    

                    <nav class="navegacion">
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                          <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php if($inicio) { ?>
                <h1>Venta y Alquiler de casas, departamentos y locales de lujo</h1>
            <?php } ?>

        </div>
    </header>