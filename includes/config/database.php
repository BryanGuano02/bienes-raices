<?php

function conectarbd(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'bienesracies_crud');

    if (!$db) {
        echo 'error no se pudo conectar';
        exit;
    }

    return $db;
}
