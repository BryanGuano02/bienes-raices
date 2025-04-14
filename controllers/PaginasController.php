<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController {
    public static function renderIndex(Router $router) {
        $propiedades = Propiedad::getAnunciosLimite(3);

        $router->render('paginas/index', [
            'propiedades' => $propiedades
        ]);

    }

    public static function renderNosotros() {
        echo 'Nosotros';
    }
}
