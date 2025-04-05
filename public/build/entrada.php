<?php
require '../includes/funciones.php';

incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Consejos para la decoración de tu hogar</h1>

    <picture>
        <source srcset="img/destacada2.webp" type="image/webp">
        <source srcset="img/destacada2.jpg" type="image/jpeg">
        <img loading="lazy" src="img/destacada2.jpg" alt="Imagen de la propiedad">
    </picture>
    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
    <div class="resumen-propiedad">
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
