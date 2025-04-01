<?php
require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

$vendedor = Vendedor::get($id);

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $args = $_POST['vendedor'];
    $vendedor->sincronizar($args);

    if (empty($errores)) {
    }
}

incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="../index.php" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST">
        <?php include '../../includes/templates/formulario_vendedores.php' ?>
        <input type="submit" class="boton boton-verde" value="Guardar cambios">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
