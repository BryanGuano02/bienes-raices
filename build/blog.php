<?php
require 'includes/funciones.php';

incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>
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
                <h4>Guía para la decoración de tu hogar</h4>
                <p>Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
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
                <p>Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="img/blog3.webp" type="image/webp">
                <source srcset="img/blog3.jpg" type="image/jpeg">
                <img loading="lazy" src="img/blog3.jpg" alt="Texto de entrada de blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu hogar</h4>
                <p>Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </a>
        </div>
    </article>

    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="img/blog4.webp" type="image/webp">
                <source srcset="img/blog4.jpg" type="image/jpeg">
                <img loading="lazy" src="img/blog4.jpg" alt="Texto de entrada de blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu hogar</h4>
                <p>Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </a>
        </div>
    </article>
</main>


<?php
incluirTemplate('footer');
?>
