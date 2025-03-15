<?php

function conectarbd(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesracies_crud');

    if (!$db) {
        echo 'error no se pudo conectar';
        exit;
    }

    return $db;
}
