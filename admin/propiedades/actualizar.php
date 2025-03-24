<?php

use App\Propiedad;
require '../../includes/app.php';
estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// Consulta para los datos de la propiedad
$propiedad = Propiedad::get($id);

$consulta = 'SELECT * FROM vendedores;';
// $resultado = mysqli_query($db, $consulta);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    debuguear($propiedad);


    // $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;


    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }

    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes añadir el número de baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes añadir el número de estacionamientos";
    }


    if (!$vendedorId) {
        $errores[] = "Debes elegir el vendedor";
    }

    $ancho = 1000;
    $alto = 100;
    $medida = $ancho * $alto;

    if ($imagen['size'] > $medida) {
        $errores[] = 'La imagen es demasiado grande';
    }

    if (empty($errores)) {
        $nombreCarpeta = 'imagenes/';

        $rutaCarpeta = dirname(__DIR__, 2) . '/' . $nombreCarpeta;

        if (!file_exists($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true);
        }

        $nombreImagen = '';

        if ($imagen['name']) {
            unlink($nombreCarpeta . $propiedad['imagen']);
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            move_uploaded_file($imagen['tmp_name'], $ruta . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }


        $query = "UPDATE propiedades SET titulo = '" . $titulo . "', precio = " . $precio . ", imagen = '" . $nombreImagen . "', descripcion = '" . $descripcion . "', habitaciones = " . $habitaciones . ", wc = " . $wc . ", estacionamiento = " . $estacionamiento . ", vendedorId = " . $vendedorId . " WHERE id = " . $id;

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /admin?resultado=2');
        }
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
