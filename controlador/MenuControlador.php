<?php
require_once 'dao/MenuDao.php';

class MenuControlador
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
    }

    public function consultarMenu($idmenu)
    {
        $sql = "SELECT * FROM Menu WHERE idmenu = " . $idmenu . ";";
        $menuDao = new MenuDao();
        $menus = $menuDao->consultar($sql);
        if ($menus) {
            return $menus[0];
        } else {
            return null;
        }
    }
}
?>