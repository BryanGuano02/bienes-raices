<?php
require '../includes/app.php';

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <?php
        $limite = 6;
        include '../includes/templates/anuncios.php'
            ?>
    </section>
</main>


<?php
incluirTemplate('footer');
?>
