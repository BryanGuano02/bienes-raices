<?php
use App\Propiedad;

if ($_SERVER['SCRIPT_NAME'] === '/build/index.php') {
    $propiedades = Propiedad::getAnunciosLimite($cantidadAnuncios);
} else {
    $propiedades = Propiedad::getAll();
}

?>
<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) { ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio casa en el lago">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="img/icono_wc.svg" alt="Icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="img/icono_dormitorio.svg" alt="Icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>

                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
        </div>
    <?php } ?>
</div>
