<?php
require 'funciones.php';
require 'config/database.php';
require dirname(__DIR__, 1) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

$bd = conectarBD();

use Model\ActiveRecord;
ActiveRecord::setBD($bd);
