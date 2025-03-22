<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', 'funciones.php');
define('CARPETA_IMAGENES', dirname(__DIR__,2) . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . '/' . $nombre . '.php';
}

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /admin/login.php');
    }

}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}
