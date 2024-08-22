<main class="contenedor contenido-centrado">
    <h2>Contacto</h2>
        <?php if($message) { ?>
            <p class="alert exito"><?php echo $message;?></p>
        <?php } ?>
        

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imágen de la página de contacto">
    </picture>

    <h3>Llena el formulario de contacto</h3>

    <form class="formulario" action="/contact" method="POST">
        <fieldset >
            <legend>Información Personal</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" placeholder="Ingrese su nombre" id="nombre" name="contact[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea placeholder="Indíquenos el motívo de su consulta" id="mensaje" name="contact[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Sobre Propiedad</legend>

            <label>Vende o Compra:</label>
            <select id="selector_VC" name="contact[tipo]" required>
                <option value="" disable selected>-- Seleccione --</option>
                <option value="Comprar">Comprar</option>
                <option value="Vender">Vender</option>
            </select>

            <label for="cantidad">Precio o Presupuesto:</label>
            <input type="number" placeholder="Ingrese su Precio o Presupuesto" id="precio-presupuesto" name="contact[cantidad]" required>
        </fieldset>
        
        <fieldset>
            <legend>Elija un medio para ser contactado:</legend>

            <div class="forma-contacto">
                <label for="contacto-telefono" class="radio-contacto">Teléfono:</label>
                <input type="radio" id="radio1" value="telefono" name="contact[contacto]" required>

                <label for="contacto-email" class="radio-contacto">Email:</label>
                <input type="radio" id="radio2" value="email" name="contact[contacto]" required>
            </div>

            <div id="contact"></div>

        </fieldset>

        <input type="submit" value="enviar" class="boton-verde">
    </form>
</main>
