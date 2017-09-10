<?php 
class Permiso {
	protected $idpermiso;
	protected $menu;
	protected $perfil;
	protected $permiso;
	protected $anulado;

    /**
     * @return mixed
     */
    public function getIdpermiso()
    {
        return $this->idpermiso;
    }

    /**
     * @param mixed $idpermiso
     *
     * @return self
     */
    public function setIdpermiso($idpermiso)
    {
        $this->idpermiso = $idpermiso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     *
     * @return self
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     *
     * @return self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param mixed $permiso
     *
     * @return self
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;

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