<?php
session_start();
require_once 'controlador/UsuarioControlador.php';
require_once 'controlador/PermisoControlador.php';
require_once 'controlador/MenuControlador.php';

if (isset($_SESSION['identificacionId'])) {
    $identificacionId = $_SESSION['identificacionId'];
    $usuarioCtl = new UsuarioControlador();
    $permisoCtl = new PermisoControlador();
    $usuario    = $usuarioCtl->consultarUsuario($identificacionId);
    $permisos   = $permisoCtl->listarPermiso($usuario->getPerfil());
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
<?php 
    for ($i = 0; $i < count($permisos); $i++) {
        $menuCtrl = new MenuControlador();
        $menu     = $menuCtrl->consultarMenu($permisos[$i]->getMenu());
        $permiso  = $permisos[$i]->getPermiso();
        if ($permiso == 1) {
            $habilitar = "";
            $enlace    = "inicio.php?accion=" . $permisos[$i]->getMenu();
        } else {
            $habilitar = " disabled";
            $enlace    = "#";
        }
?>
                <li class="nav-item active">
                    <a class="nav-link<?php echo $habilitar?>" href="<?php echo $enlace ?>"><span class="<?php echo $menu->getIcono()?>" aria-hidden="true"></span> <?php echo $menu->getNombre()?></a>
                </li>
<?php 
    }
?>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span> Salir</a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<?php 
    if (isset($_GET['accion'])) {
        $accion = $_GET['accion'];
        switch ($accion) {
            case "1":
                echo "OPCION UNO";
                break;
            case "2":
                echo "OPCION DOS";
                break;
        }
    } else {
        echo "INGRESO CORRECTO";
    }
?>
    </main>
</body>
<footer class="bg-faded align-middle" style="width: 100%; border-top: 1px solid #E0E0E0; position: absolute; bottom: 0px">
    <div class="container">
        <div class="row" style="font-size: 12px">
            <div class="col-6" style="border-right: 1px solid #E0E0E0; border-left: 1px solid #E0E0E0" align="left">Mensaje</div>
            <div class="col" style="border-right: 1px solid #E0E0E0" align="center">Modulo</div>
            <div class="col" style="border-right: 1px solid #E0E0E0" align="center">© 2017 - Corp.com</div>
        </div>
    </div>
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
        $usuarioCtl->guardarUltima_sesion($identificacionId);
        header("location: inicio.php");
    } else {
        header("location: index.php?mensaje=L001");
    }
} else {
    header("location: index.php");
}
?>