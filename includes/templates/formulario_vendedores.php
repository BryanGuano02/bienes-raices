<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedor(a)"
        value='<?php echo sanitizar($vendedor->nombre); ?>'>

    <label for="apellido">Apellido: </label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor(a)"
        value='<?php echo sanitizar($vendedor->apellido); ?>'>
</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="telefono">Telefono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono vendedor(a)"
        value='<?php echo sanitizar($vendedor->telefono); ?>'>
</fieldset>
