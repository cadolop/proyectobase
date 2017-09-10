<?php 
require_once 'modelos/Menu.php';
require_once 'bd/Conexion.php';

class MenuDao {

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
                $menus[$i] = new Menu();

                $menus[$i]->setIdmenu($row["idmenu"]);
                $menus[$i]->setNombre($row["nombre"]);
                $menus[$i]->setIcono($row["icono"]);
                $menus[$i]->setAnulado($row["anulado"]);
                $i = $i + 1;
            }
        }
        return(isset($menus)?$menus:null);
    }

    public function ejecutar($sql) 
    {
        $conn = Conexion::getInstance();
        return $conn->exec($sql);
    }
}
?>