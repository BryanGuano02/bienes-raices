<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;


$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (empty($errores)) {
    }
}

incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Registrar Vendedores</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="../index.php" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php">
        <?php include '../../includes/templates/formulario_vendedores.php' ?>
        <input type="submit" class="boton boton-verde" value="Registrar Vendedor">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
