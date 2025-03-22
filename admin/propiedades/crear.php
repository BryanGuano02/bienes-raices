<?php
require '../../includes/app.php';
use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

estaAutenticado();

$db = conectarBD();

$consulta = 'SELECT * FROM vendedores;';
$resultado = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';
$creado = date('Y/m/d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST);
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['imagen']['tmp_name']) {
        $manager = new Image(Driver::class);
        $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }
    $errores = $propiedad->validar();

    if (empty($errores)) {
        echo "Ruta de carpeta: " . CARPETA_IMAGENES . "<br>";
        echo "¿Existe la carpeta? " . (is_dir(CARPETA_IMAGENES) ? 'Sí' : 'No') . "<br>";
        echo "¿Es escribible? " . (is_writable(CARPETA_IMAGENES) ? 'Sí' : 'No') . "<br>";

        // $nombreCarpetaImagenes  = dirname(__DIR__, 2) . '/imagenes/';
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0755, true);
        }

        // if (!file_exists($nombreCarpetaImagenes)) {
        //     mkdir($nombreCarpetaImagenes, 0777, true);
        // }

        // $imagen->save($nombreCarpetaImagenes . $nombreImagen);
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);

        $resultado = $propiedad->guardar();

        if ($resultado) {
            header('Location: /admin?resultado=1');
        }
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

    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php"
        enctype='multipart/form-data'>
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value='<?php echo $titulo; ?>'>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad"
                value='<?php echo $precio; ?>'>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

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

        <input type="submit" class="boton boton-verde" value="Crear Propiedad">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
