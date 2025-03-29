<?php

namespace App;

class ActiveRecord {
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
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear()
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

        if ($resultado) {
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizasDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }
        $query = "UPDATE propiedades SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$bd->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$bd->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=2');
        }
    }

    public function eliminar()
    {
        $query = "DELETE FROM propiedades WHERE id = " . self::$bd->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$bd->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
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
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
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
    public function hola()
    {
        echo "hola";
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
