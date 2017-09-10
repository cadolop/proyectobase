<?php
class Conexion
{
    private $_connection;
    private static $_instance;

    private function __construct()
    {
        $this->_connection = new PDO("mysql:host=serv003.mysql.database.azure.com;dbname=electivas", "int@serv003", "Electivas2017");
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function query($sql)
    {
        return $this->_connection->query($sql);
    }

    public function exec($sql)
    {
        return $this->_connection->exec($sql);
    }
}
?>