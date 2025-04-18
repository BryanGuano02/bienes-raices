<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

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
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
        $router->render('paginas/contacto', []);
    }
}
