<?php
require '../includes/app.php';

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="img/destacada3.webp" type="image/webp">
        <source srcset="img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form action="/contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>


            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

            <label for="mensaje">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value=" Compra">Compra</option>
               <option value="Vende">Vende </option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input type="numbre" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[presupuesto]" required>

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser Contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contactar]" required>

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" name="contacto[contactar]" required>
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
