<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $funcion) {
        $this->rutasGET[$url] = $funcion;
    }
    public function post($url, $funcion) {
        $this->rutasPOST[$url] = $funcion;
    }

    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if (!$fn) {
            echo 'Página no encontrada';
        }

        call_user_func($fn, $this);
    }

    public function render($view, $datos =[]) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/" . $view . ".php";
        $contenido = ob_get_clean();
        include __DIR__ . '/views/layout.php';
    }
}
