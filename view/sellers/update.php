<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>

    <?php foreach ($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?> 
            </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Página anterior</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/form.php'?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
</main>