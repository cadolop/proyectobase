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
        $usuarios = $usuarioDao->consultar($sql);
        if ($usuarios && password_verify($clave, $usuarios[0]->getContrasena())) {
            return true;
        } else {
            return false;
        }
    }

    public function guardarUltima_sesion($identifidacionId) 
    {
        $sql = "UPDATE usuario " .
               "   SET ultima_sesion = '" . date('Y-m-d',strtotime('now')) . "' " .
               " WHERE login = '". $identifidacionId . "';";
        $usuarioDao = new UsuarioDao();
        return $usuarioDao->ejecutar($sql);
    }

    public function consultarUsuario($identifidacionId) 
    {
        $sql = "SELECT * FROM usuario WHERE login = '" . $identifidacionId . "';";
        $usuarioDao = new UsuarioDao();
        $usuarios = $usuarioDao->consultar($sql);
        if ($usuarios) {
            return $usuarios[0];
        } else {
            return null;
        }
    }
}
?>