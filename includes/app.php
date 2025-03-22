<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$bd = conectarBD();
use App\Propiedad;

Propiedad::setBD($bd);
