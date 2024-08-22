<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>

    <?php foreach ($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?> 
            </div>
    <?php endforeach; ?>
    
    <a href="/admin" class="boton boton-verde">Página anterior</a>

    <form class="formulario" method="POST" enctype="multipart/form-data" action="/seller/create">
        <?php include __DIR__ . '/form.php'?>

        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>
</main>