<?php
namespace APP\Models;

abstract class DataBase {
    protected $conexion;

    public function __construct() {
        $this->conexion = new \mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
}
?>