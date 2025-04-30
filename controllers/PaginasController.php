<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function renderIndex(Router $router) {
        $propiedades = Propiedad::getAnunciosLimite(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);

    }

    public static function renderNosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }
    public static function renderPropiedades(Router $router) {
        $propiedades = Propiedad::getAll();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function renderPropiedad(Router $router) {
        $id = verificarId(('/propiedades'));
        $propiedad = Propiedad::get($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function renderBlog(Router $router) {
        $router->render('paginas/blog');
    }
    public static function renderEntrada(Router $router) {
        $router->render('paginas/entrada');
    }
    public static function renderContacto(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            $mail = self::crearMailer();
            $mail = self::settearContenido($mail, $respuestas);

            if ($mail->send()) {
                echo 'mensaje enviado case correctamente';
            } else {
                echo 'mensaje no enviado case correctamente';
            }
        }

        $router->render('paginas/contacto', []);
    }

    private static function crearMailer() {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;

        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];

        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;
        return $mail;
    }

    private static function settearContenido(PHPMailer $mail, array $respuestas) {
        $mail->setFrom('admin@bienesraices.com');
        $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
        $mail->Subject = 'Tienes un nuevo mensaje';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p> Tienes un nuevo mensaje: ' . $respuestas['nombre'] . '</p>';
        $contenido .= $respuestas['email'];
        $contenido .= $respuestas['telefono'];
        $contenido .= $respuestas['mensaje'];
        $contenido .= $respuestas['tipo'];
        $contenido .= $respuestas['precio'];
        $contenido .= 'Forma de contacto: ' . $respuestas['contacto'];
        $contenido .= $respuestas['fecha'] . ' y ' . $respuestas['hora'];
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto alternativo sin HTML';

        return $mail;
    }
}
