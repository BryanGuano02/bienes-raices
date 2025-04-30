<?php

require_once '../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

// asd
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar',  [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar',  [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'renderIndex']);
$router->get('/nosotros', [PaginasController::class, 'renderNosotros']);
$router->get('/propiedades', [PaginasController::class, 'renderPropiedades']);
$router->get('/propiedad', [PaginasController::class, 'renderPropiedad']);
$router->get('/blog', [PaginasController::class, 'renderBlog']);
$router->get('/entrada', [PaginasController::class, 'renderEntrada']);
$router->get('/contacto', [PaginasController::class, 'renderContacto']);
$router->post('/contacto', [PaginasController::class, 'renderContacto']);

$router->comprobarRutas();
