<?php
require '../../includes/app.php';
require '../../vendor/autoload.php';

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Propiedad;
use App\Vendedor;

estaAutenticado();

$propiedad = new Propiedad();

$vendedores = Vendedor::getAll();

$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST['propiedad']);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(new Driver());
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }
    $errores = $propiedad->validar();

    if (empty($errores)) {
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0755, true);
        }

        $imagen->save(CARPETA_IMAGENES . $nombreImagen);

        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="../index.php" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype='multipart/form-data'>
        <?php include '../../includes/templates/formulario_propiedades.php' ?>
        <input type="submit" class="boton boton-verde" value="Crear Propiedad">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
