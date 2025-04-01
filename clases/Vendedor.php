<?php

namespace App;

class Vendedor extends ActiveRecord {

    protected static $columnas_BD = ['id', 'nombre', 'apellido', 'telefono'];
    protected static $tabla = 'vendedores';

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public function __construct($args = []) {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
}
