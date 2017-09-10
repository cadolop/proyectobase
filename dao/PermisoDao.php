<?php
require_once 'modelos/Permiso.php';
require_once 'bd/Conexion.php';

class PermisoDao
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
    }

    public function consultar($sql)
    {
        $conn = Conexion::getInstance();
        if ($result = $conn->query($sql)) {
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $permisos[$i] = new Permiso();

                $permisos[$i]->setIdpermiso($row["idpermiso"]);
                $permisos[$i]->setMenu($row["menu"]);
                $permisos[$i]->setPerfil($row["perfil"]);
                $permisos[$i]->setPermiso($row["permiso"]);
                $permisos[$i]->setAnulado($row["anulado"]);
                $i = $i + 1;
            }
        }
        return(isset($permisos)?$permisos:null);
    }

    public function ejecutar($sql) 
    {
        $conn = Conexion::getInstance();
        return $conn->exec($sql);
    }
}
?>