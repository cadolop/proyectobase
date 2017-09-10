<?php
require_once 'modelos/Usuario.php';
require_once 'bd/Conexion.php';

class UsuarioDao
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
    }

    public function ejecutar($sql)
    {
        $conn = Conexion::getInstance();
        if ($result = $conn->query($sql)) {
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $usuarios[$i] = new usuario();

                $usuarios[$i]->setIdusuario($row["idusuario"]);
                $usuarios[$i]->setLogin($row["login"]);
                $usuarios[$i]->setContrasena($row["contrasena"]);
                $usuarios[$i]->setUltimaSesion($row["ultima_sesion"]);
                $usuarios[$i]->setPerfil($row["perfil"]);
                $usuarios[$i]->setAnulado($row["anulado"]);
                $i = $i + 1;
            }
        }
        return(isset($usuarios)?$usuarios:null);
    }
}

?>
