<fieldset>
    <legend>Información General</legend>
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad"
        value='<?php echo sanitizar($propiedad->titulo); ?>'>

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad"
        value='<?php echo sanitizar($propiedad->precio); ?>'>

    <label for="imagen">Imagen</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="Imagen actual de la propiedad" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion"
        name="propiedad[descripcion]"><?php echo sanitizar($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9"
        value='<?php echo sanitizar($propiedad->habitaciones); ?>'>

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9"
        value='<?php echo sanitizar($propiedad->wc); ?>'>

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9"
        value='<?php echo sanitizar($propiedad->estacionamiento); ?>'>
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected  value="">-- Seleccione--</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedorId == $vendedor->id ? 'selected' : '';?> value="<?php echo sanitizar($vendedor->id); ?>"><?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>
