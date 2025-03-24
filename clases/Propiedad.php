<?php

namespace App;

class Propiedad
{

    protected static $bd;
    protected static $columnas_BD = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    protected static $errores = [];

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
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? 1;
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

        $resultado = self::$bd->query($query);
        return $resultado;
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

        foreach ($atributos as $key => $valor) {
            $sanitizado[$key] = self::$bd->escape_string($valor);
        }

        return $sanitizado;

    }

    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir el número de habitaciones";
        }

        if (!$this->wc) {
            self::$errores[] = "Debes añadir el número de baños";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir el número de estacionamientos";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "Debes elegir el vendedor";
        }

        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }

    public function setImagen($imagen)
    {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function getAll()
    {
        $query = "SELECT * FROM propiedades";
        $propiedades = self::consultarSQL($query);
        return $propiedades;
    }

    public static function get($id)
    {
        $query = 'SELECT * FROM propiedades WHERE id = ' . $id;

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        $resultado = self::$bd->query($query);

        $objetosObtenidos = [];

        while ($registro = $resultado->fetch_assoc()) {
            $objetosObtenidos[] = self::crearObjeto($registro);
        }

        $resultado->free();
        return $objetosObtenidos;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
