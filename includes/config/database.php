<?php

function conectarBD(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesracies_crud');

    if (!$db) {
        echo 'Error no se pudo conectar';
        exit;
    }

    return $db;
}
