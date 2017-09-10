<?php
class Usuario
{
    protected $idusuario;
    protected $login;
    protected $contrasena;
    protected $ultima_sesion;
    protected $perfil;
    protected $anulado;

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     *
     * @return self
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     *
     * @return self
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUltimaSesion()
    {
        return $this->ultima_sesion;
    }

    /**
     * @param mixed $ultima_sesion
     *
     * @return self
     */
    public function setUltimaSesion($ultima_sesion)
    {
        $this->ultima_sesion = $ultima_sesion;

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
