<?php
class Mensaje
{
    protected $texto;
    protected $tipo;


    /**
     * Class Constructor
     * @param    $texto
     * @param    $tipo
     */
    public function __construct($texto, $tipo)
    {
        $this->texto = $texto;
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
?>
