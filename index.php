<?php
session_start();
require_once 'util/Mensaje.php';
require_once 'util/Collection.php';

if (isset($_SESSION['identificacionId'])) {
    header("location: inicio.php");
} else {
    $mensajes = new Collection();
    $mensajes->addItem(new Mensaje("Contraseña incorrecta", "danger"), "L001");
    $mensajes->addItem(new Mensaje("Por favor ingrese usuario y contraseña", "danger"), "L002");

    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        $msj = $mensajes->getItem($mensaje);
    }
}
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 bg-faded mt-5" style="box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3)">
                <form class="form-group" id="logueo" name="logueo" role="form" action="inicio.php" method="post">
                    <h1 class="bd-title text-center">Ingreso</h1>
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at" aria-hidden="true"></i></div>
                            <input type="text" name="identificacionId" class="form-control" id="identificacionId" placeholder="Usuario Registrado" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key" aria-hidden="true"></i></div>
                            <input type="password" name="clave" class="form-control" id="clave" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button name="submit" id="submit" class="btn btn-success" type="submit" value="ingresar"><i class="fa fa-sign-in"></i> Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='row justify-content-center mt-5'>
            <?php
            if (isset($msj)) {
                echo "<div id='mensajeP' class='alert alert-" . $msj->getTipo() . " alert-dismissable col-md-4' fade show role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" . $msj->getTexto() . "</div>";
            } else {
                echo "<div id='mensajeP'></div>";
            }
            ?>
        </div>
    </div>
</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        $("#submit").click(function () {

            var login = $("#identificacionId").val(), contrasena = $("#clave").val();

            if ((login === "") || (contrasena === "")) {
                location.assign("index.php?mensaje=L002");;
            } else {
                return true;
            }
            return false;
        });
    });
</script>
</body>
<footer class="bg-faded align-middle" style="width: 100%; border-top: 1px solid #E0E0E0; position: absolute; bottom: 0px">
    <div class="container">
        <div class="row" style="font-size: 12px">
            <div class="col-6" style="border-right: 1px solid #E0E0E0; border-left: 1px solid #E0E0E0" align="left"></div>
            <div class="col" style="border-right: 1px solid #E0E0E0" align="center"></div>
            <div class="col" style="border-right: 1px solid #E0E0E0" align="center">© 2017 - Corp.com</div>
        </div>
    </div>
</footer>
</html>
