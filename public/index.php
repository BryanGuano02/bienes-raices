<?php

require_once '../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;

$router = new Router();

$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedad/actualizar',  [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedor/crear', [VendedorController::class, 'crear']);
$router->post('/vendedor/crear', [VendedorController::class, 'crear']);
$router->get('/vendedor/actualizar',  [VendedorController::class, 'actualizar']);
$router->post('/vendedor/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedor/eliminar', [VendedorController::class, 'eliminar']);

$router->comprobarRutas();
