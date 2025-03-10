<?php
require 'includes/funciones.php';
require 'includes/config/database.php';

$db = conectarBD();

incluirTemplate('header');

$id = $_GET['id'];

$query = "SELECT * FROM propiedades WHERE id = ". $id;

$resultado = mysqli_query($db, $query);

if (!$resultado ->num_rows){
    header('location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);

?>
<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']?></h1>

    <picture>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad">
    </picture>
    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad['precio']?></p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="img/icono_wc.svg" alt="Icono wc">
                <p><?php echo $propiedad['wc']?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                <p><?php echo $propiedad['estacionamiento']?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="img/icono_dormitorio.svg" alt="Icono habitaciones">
                <p><?php echo $propiedad['habitaciones']?></p>
            </li>
        </ul>
        <p><?php echo $propiedad['descripcion']?></p>
    </div>

</main>

<?php
mysqli_close($db);
incluirTemplate('footer');
?>
