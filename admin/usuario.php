<?php
// Importar la conexión
require 'includes/config/database.php';
$bd = conectarBD();

// Crear un email y password
$email = "test@test.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('" . $email . "' , '" . $passwordHash . "');";

echo $query;

mysqli_query($bd, $query);
