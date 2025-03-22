<?php
require 'includes/funciones.php';
estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

require 'includes/config/database.php';

// BDs
$db = conectarBD();

// Consulta para los datos de la propiedad
$consulta = 'SELECT * FROM propiedades WHERE id = ' . $id;
$resultadoPropiedad = mysqli_query($db, $consulta);

$propiedad = mysqli_fetch_assoc($resultadoPropiedad);


$consulta = 'SELECT * FROM vendedores;';
$resultado = mysqli_query($db, $consulta);


$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$creado = date('Y/m/d');
$imagenPropiedad = $propiedad['imagen'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = isset($_POST['vendedorId']) ? mysqli_real_escape_string($db, $_POST['vendedorId']) : null;
    $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;


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
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value='<?php echo $titulo; ?>'>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad"
                value='<?php echo $precio; ?>'>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small"
                alt="Imagen actual de la propiedad">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9"
                value='<?php echo $habitaciones; ?>'>

            <label for="wc">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value='<?php echo $wc; ?>'>

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9"
                value='<?php echo $estacionamiento; ?>'>
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>

                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>
                        value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?>
                    </option>
                <?php endwhile ?>
            </select>
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Actualizar Propiedad">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
