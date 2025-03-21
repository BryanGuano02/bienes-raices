<?php

namespace App;



class Propiedad
{

    protected static $bd;
    protected static $columnas_BD = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public static function setBD($database)
    {
        self::$bd = $database;
    }
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar()
    {
        $atributos = $this->sanitizasDatos();

        $nombresAtributos = join(', ', array_keys($atributos));
        $valoresAtributos = join("', '", array_values($atributos));

        $query = "INSERT INTO propiedades ( ";
        $query .= $nombresAtributos;
        $query .= " ) VALUES (' ";
        $query .= $valoresAtributos;
        $query .= " ')";

        debuguear($query);

        $resultado = self::$bd->query($query);
        debuguear($resultado);
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnas_BD as $columna) {
            if ($columna === 'id')
                continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizasDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $valor) {
            $sanitizado[$key] = self::$bd->escape_string($valor);
        }

        return $sanitizado;

    }
}
