<?php


require 'funciones.php';
require 'config/database.php';
require dirname(__DIR__, 1) . '/vendor/autoload.php';

$bd = conectarBD();

use Model\ActiveRecord;
ActiveRecord::setBD($bd);
