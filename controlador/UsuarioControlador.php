<?php
require_once 'dao/UsuarioDao.php';

class UsuarioControlador
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
    }

    public function validarUsuario($identifidacionId, $clave)
    {
        $sql = "SELECT * FROM usuario WHERE login = '" . $identifidacionId . "';";
        $usuarioDao = new UsuarioDao();
        $usuarios = $usuarioDao->ejecutar($sql);
        if ($usuarios && password_verify($clave, $usuarios[0]->getContrasena())) {
            return true;
        } else {
            return false;
        }
    }
}

?>
