<?php
declare(strict_types=1);
require '../includes/app.php';

incluirTemplate('header', $inicio = true);
?>
<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="img/icono1.svg" alt="Icono de seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nam culpa officiis cupiditate
                accusamus accusantium ullam quiavoluptates saepe? Cumque?</p>
        </div>
        <div class="icono">
            <img src="img/icono2.svg" alt="Icono de dinero" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nam culpa officiis cupiditate
                accusamus accusantium ullam quiavoluptates saepe? Cumque?</p>
        </div>
        <div class="icono">
            <img src="img/icono3.svg" alt="Icono de reloj" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nam culpa officiis cupiditate
                accusamus accusantium ullam quiavoluptates saepe? Cumque?</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>
    <?php
    $cantidadAnuncios = 3;
    include '../includes/templates/anuncios.php'
        ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="img/blog1.webp" type="image/webp">
                    <source srcset="img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="img/blog1.jpg" alt="Texto de entrada de blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="img/blog2.webp" type="image/webp">
                    <source srcset="img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="img/blog2.jpg" alt="Texto de entrada de blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron
                cumple con todas mis expectativas.
            </blockquote>
            <p>- Bryan Guano</p>
        </div>
    </section>
</div>

<?php
incluirTemplate('footer');
?>
