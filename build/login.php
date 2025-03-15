<?php
require 'includes/config/database.php';
$bd = conectarBD();

$errores = [];
$email = '';
$password = '';



// require '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '<pre>';

    $email = mysqli_real_escape_string($bd, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($bd, $_POST['password']);

    if (!$email) {
        $errores[] = "El Email es obligatorio o no es valido";

    }

    if (!$password) {
        $errores[] = "El Password es obligatorio";
    }

    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE email = '" . $email . "';";
        $resultado = mysqli_query($bd, $query);

        if ($resultado->num_rows) {
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;


                echo '<pre>';
                var_dump($_SESSION);
                echo '<pre>';
            } else {
                $errores[] = 'El password es incorrecto';
            }

            // echo '<pre>';
            // var_dump($usuario);
            // echo '<pre>';
        } else {
            $errores[] = "El usuario no existe";
        }

    }
}

require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" action="" class="formulario">

        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input name="email" type="email" placeholder="Tu Email" id="email" value="<?php echo $email; ?>">

            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Tu Password" id="password"
                value="<?php echo $password; ?>">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>


<?php
incluirTemplate('footer');
?>
