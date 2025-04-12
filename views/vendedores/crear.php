<main class="contenedor seccion">
    <h1>Registrar Vendedor(a)</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="../admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php">
        <?php include 'formulario.php' ?>
        <input type="submit" class="boton boton-verde" value="Registrar Vendedor">
    </form>
</main>
