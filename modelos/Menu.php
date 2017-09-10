<?php 
class Menu {
	protected $idmenu;
	protected $nombre;
	protected $icono;
	protected $anulado;


    /**
     * @return mixed
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }

    /**
     * @param mixed $idmenu
     *
     * @return self
     */
    public function setIdmenu($idmenu)
    {
        $this->idmenu = $idmenu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * @param mixed $icono
     *
     * @return self
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnulado()
    {
        return $this->anulado;
    }

    /**
     * @param mixed $anulado
     *
     * @return self
     */
    public function setAnulado($anulado)
    {
        $this->anulado = $anulado;

        return $this;
    }
}
?>