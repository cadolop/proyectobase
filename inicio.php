<?php
session_start();
require_once 'controlador/UsuarioControlador.php';

if (isset($_SESSION['identificacionId'])) {
    $identificacionId = $_SESSION['identificacionId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9e668cb71e.js"></script>
    <style>
        body {
            font-family: 'Helvetica Neue',
            font-weight: 'normal';
        }
        footer {
            font-family: 'Helvetica Neue',
            font-weight: 'normal';
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-toggleable-lg navbar-light bg-faded" style="width:80%; margin:20px auto;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Opciones</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="fa fa-home" aria-hidden="true"></span> Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span> Salir</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
<footer class="bg-inverse text-white p-1" style="width: 100%; height: 50px; bottom: 0; position: fixed;">
   <p class="text-center">© 2017 - IngnovaTec.com</p>
</footer>
</html>
<?php

} else if ($_POST['submit'] == "ingresar") {
    $identificacionId  = $_POST['identificacionId'];
    $clave             = $_POST['clave'];
    $identificacionId  = stripslashes($identificacionId);
    $clave             = stripslashes($clave);

    $usuarioCtl = new UsuarioControlador();
    if ($usuarioCtl->validarUsuario($identificacionId, $clave)) {
        $_SESSION['identificacionId'] = $identificacionId;
        header("location: inicio.php");
    } else {
        header("location: index.php?mensaje=L001");
    }
} else {
    header("location: index.php");
}
?>
