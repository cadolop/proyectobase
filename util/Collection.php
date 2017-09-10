<?php
class Collection
{
    private $items = array();

    public function addItem($obj, $key = null)
    {
        if ($key == null) {
            $this->items[] = $key;
        } else {
            if (isset($this->items[$key])) {
                error_log("Error al insertar Item");
            } else {
                $this->items[$key] = $obj;
            }
        }
    }

    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        } else {
            error_log("Error al borrar Item");
        }
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            error_log("Error al consultar Item");
        }
    }
}
?>
