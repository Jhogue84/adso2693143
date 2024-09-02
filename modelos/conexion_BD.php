<?php

namespace modelo;
use mysqli;
class  Conexion_BD {
    private $servidor = "localhost";
    private $usuario = "root";
    private $basededatos = "api2693143";
    private $clave = "";
    private $conexion;

    public function __construct() {
        $this->Conectarse() ;
    }

    public function Conectarse() {
        $this->conexion = new mysqli( $this->servidor, $this->usuario,$this->clave, $this->basededatos);
        echo !$this->conexion->error ?"Conexion exitosa":"error";    

    }
}








