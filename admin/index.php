<?php
require 'includes/funciones.php';
estaAutenticado();

// Importar conexion
require 'includes/config/database.php';
$db = conectarBD();

// Escribir el query
$query = 'SELECT * FROM propiedades;';

// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query);

// Mostrar resultados

// Mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $queryImagen = "SELECT imagen FROM propiedades WHERE id = " . $id;
        $resultadoImagen = mysqli_query($db, $queryImagen);
        $imagenAEliminar = mysqli_fetch_assoc($resultadoImagen);

        unlink('imagenes/' . $imagenAEliminar['imagen']);

        $queryEliminacion = "DELETE FROM propiedades WHERE id = " . $id;
        $resultadoEliminacion = mysqli_query($db, $queryEliminacion);

        if ($resultadoEliminacion) {
            header('location: /admin?resultado=3');
        }
    }
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Panel de Administración</h1>

    <?php if (intval($resultado) === 1): ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif (intval($resultado) === 2): ?>
        <p class="alerta exito">Anuncio actualizado correctamente</p>
    <?php elseif (intval($resultado) === 3): ?>
        <p class="alerta exito">Anuncio eliminado correctamente</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>"
                            class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>


<?php
mysqli_close($db);
incluirTemplate('footer');
?>
