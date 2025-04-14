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
}
