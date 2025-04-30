<link rel="stylesheet" href="">
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form action="contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input name="contacto[nombre]" type="text" placeholder="Tu Nombre" id="nombre" required>

            <label for="email">E-mail</label>
            <input name="contacto[email]" type="email" placeholder="Tu Email" id="email">


            <label for="telefono">Teléfono</label>
            <input name="contacto[telefono]" type="tel" placeholder="Tu Teléfono" id="telefono">

            <label for="mensaje">Mensaje:</label>
            <textarea name="contacto[mensaje]" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones">
                <option value="" disabled selected>-- Seleccione --</option>
                <option name="contacto[tipo]" value="Compra">Compra</option>
                <option name="contacto[tipo]" value="Vende">Vende </option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input name="contacto[precio]" type="numbre" placeholder="Tu Precio o Presupuesto" id="presupuesto">

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser Contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input name="contacto[telefono]" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
