<?php

use Model\Property;

if ($_SERVER['SCRIPT_NAME'] === '/properties') {
    $propiedades = Property::all();
} else {
    $propiedades = Property::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
       
        <img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio" loading="lazy">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo;?></h3>
            <p><?php echo $propiedad->descripcion;?></p>
            <p class="precio">$<?php echo $propiedad->precio;?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono baño">
                    <p><?php echo $propiedad->wc;?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad->cocheras;?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono habitacion">
                    <p><?php echo $propiedad->habitaciones;?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad->id;?>" class="boton boton-naranja">
                Ver Propiedad
            </a>
        </div> <!--.contenido-anuncio-->
    </div> <!--.anuncio-->
    <?php endforeach; ?>
</div> <!--.contenedor-anuncios-->