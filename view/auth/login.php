<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="post" class="formulario" action="/login" >
        <fieldset >
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Ingrese su direccion de correo electrónico" id="email" >

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Digite su clave" id="password" >
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>