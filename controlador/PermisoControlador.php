<?php
require_once 'dao/PermisoDao.php';

class PermisoControlador
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
    }

    public function listarPermiso($perfil)
    {
        $sql = "SELECT * FROM Permiso WHERE perfil = " . $perfil . ";";
        $permisoDao = new PermisoDao();
        return $permisoDao->consultar($sql);
    }
}
?>