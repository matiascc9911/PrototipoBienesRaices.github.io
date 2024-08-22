<main class="contenedor anuncio-destacado contenido-centrado">
    <h2><?php echo $property->titulo;?></h2>

    <img src="/imagenes/<?php echo $property->imagen;?>" alt="Anuncio" loading="lazy">

    <div class="resumen-propiedad">

        <p class="precio">$<?php echo $property->precio;?></p>
        
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" src="build/img/icono_wc.svg" alt="Icono baño">
                <p><?php echo $property->wc;?></p>
            </li>

            <li>
                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                <p><?php echo $property->cocheras;?></p>
            </li>

            <li>
                <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono habitacion">
                <p><?php echo $property->habitaciones;?></p>
            </li>
        </ul>

        <p><?php echo $property->descripcion;?></p>
    </div> <!-- resumen-propiedad -->
</main>
