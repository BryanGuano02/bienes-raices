<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta frente al bosque</h1>

    <picture>
        <source srcset="img/destacada.webp" type="image/webp">
        <source srcset="img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="img/destacada.jpg" alt="Imagen de la propiedad">
    </picture>
    <div class="resumen-propiedad">
        <p class="precio">13,000,000</p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="img/icono_wc.svg" alt="Icono wc">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="img/icono_dormitorio.svg" alt="Icono habitaciones">
                <p>4</p>
            </li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum repellendus suscipit atque aperiam
            laborum alias, a ratione iste incidunt aliquam, quisquam quasi necessitatibus doloremque quo deserunt
            aliquid ipsum id officiis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus
            temporibus dolor illum repellendus maxime sunt, qui nobis doloremque eos vero distinctio laudantium,
            asperiores ea dolorem iure dolorum dicta enim mollitia.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum repellendus suscipit atque aperiam
            laborum alias, a ratione iste incidunt aliquam, quisquam quasi necessitatibus doloremque quo deserunt
            aliquid ipsum id officiis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus
            temporibus dolor illum repellendus maxime sunt, qui nobis doloremque eos vero distinctio laudantium,
            asperiores ea dolorem iure dolorum dicta enim mollitia.</p>
    </div>

</main>

<?php
incluirTemplate('footer');
?>
