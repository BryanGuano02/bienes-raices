<?php

namespace App;

class ActiveRecord
{
    protected static $bd;
    protected static $columnas_BD = '';
    protected static $tabla = '';

    protected static $errores = [];


    public static function setBD($database)
    {
        self::$bd = $database;
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
        $atributos = $this->sanitizarDatos();

        $nombresAtributos = join(', ', array_keys($atributos));
        $valoresAtributos = join("', '", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . " ( ";
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
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }
        $query = "UPDATE ". static::$tabla ." SET ";
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
        $query = "DELETE FROM ". static::$tabla ." WHERE id = " . self::$bd->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$bd->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }


    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnas_BD as $columna) {
            if ($columna === 'id')
                continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos()
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
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
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
        $query = "SELECT * FROM " . static::$tabla;
        $propiedades = self::consultarSQL($query);
        return $propiedades;
    }
    public static function getAnunciosLimite($cantidadAnuncios)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidadAnuncios;
        $propiedades = self::consultarSQL($query);
        return $propiedades;
    }


    public static function get($id)
    {
        $query = 'SELECT * FROM ' . static::$tabla . ' WHERE id = ' . $id;

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
            $objetosObtenidos[] = static::crearObjeto($registro);
        }

        $resultado->free();
        return $objetosObtenidos;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;
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
