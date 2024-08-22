<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php   
        if($resultado):
            $mensaje = showNotifications(intval($resultado));
            if ($mensaje) : ?>
                <p class="alert exito"><?php echo s($mensaje) ?></p>
            <?php endif; 
        endif; ?>
        


    <a href="/property/create" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/seller/create" class="boton boton-naranja-iblock">Nuevo Vendedor</a>


    <h2> Propiedades </h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>
            <!-- Mostrando los resultados en el documento -->
            <?php foreach($properties as $propiedad): ?>

                <tr>
                    <td><?php echo $propiedad->id;?></td>
                    <td><?php echo $propiedad->titulo;?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen;?>" class="image-table"></td>
                    <td>$ <?php echo $propiedad->precio;?></td>
                    <td>
                        <form method="POST" class="w-100" action="/property/delete">
                            <input type="submit" class="boton-bordo-block" value="Eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                        </form>
                        <a href="/property/update?id=<?php echo $propiedad->id; ?>" class="boton-naranja">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <h2> Vendedores </h2>

    <table class="vendedores">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>
            <!-- Mostrando los resultados en el documento -->
            <?php foreach($sellers as $vendedor): ?>

                <tr>
                    <td><?php echo $vendedor->id;?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido;?></td>
                    <td><?php echo $vendedor->telefono;?></td>
                    <td>
                        <form method="POST" class="w-100" action="/seller/delete">
                            <input type="submit" class="boton-bordo-block" value="Eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                        </form>
                        <a href="/seller/update?id=<?php echo $vendedor->id; ?>" class="boton-naranja">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</main>