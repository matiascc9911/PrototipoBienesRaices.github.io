<?php
    //isset() se encarga de determinar si una variable es NULL o no 
    if (!isset($_SESSION)) {
        session_start();
    }

    // Si la variable no es TRUE entonces es FALSE
    $auth = $_SESSION['login'] ?? false;

    if(!isset($homePage)) {
        $homePage = false;
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $homePage? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" class="logo-header">
                </a>

                <div class="right-side">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg" alt="icono de modo oscuro">
    
                    <div class="mobile-menu">
                        <img src="../build/img/barras.svg" alt="icono menu responsive">
                    </div>

                    <nav class="navegacion">
                        <a href="/properties">Anuncios</a>
                        <a href="/about-us">Nosotros</a>
                        <a href="/blogs">Blog</a>
                        <a href="/contact">Contacto</a>
                        <?php if($auth): ?>
                          <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php if($homePage) { ?>
                <h1>Venta y Alquiler de casas, departamentos y locales de lujo</h1>
            <?php } ?>

        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion-footer">
        <div class="contenedor">
            <nav class="navegacion">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" class="logo-header">
                </a>
                <a href="/about-us">Nosotros</a>
                <a href="/properties">Anuncios</a>
                <a href="/blogs">Blog</a>
                <a href="/contact">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>

    </body>
</html>