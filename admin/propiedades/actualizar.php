<?php
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
require '../../includes/app.php';
estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

$propiedad = Propiedad::get($id);
$vendedores = Vendedor::getAll();
$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    $errores = $propiedad->validar();

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(new Driver());

        // Abrir la imagen y redimensionarla
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    if (empty($errores)) {
        // Almacenar la imagen
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        }

        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="../index.php" class="boton boton-verde">Volver</a>

    <form action="" class="formulario" method="POST" enctype='multipart/form-data'>
        <?php include '../../includes/templates/formulario_propiedades.php' ?>
        <input type="submit" class="boton boton-verde" value="Actualizar Propiedad">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
