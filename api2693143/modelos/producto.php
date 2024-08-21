<?php

require_once ("conexionPDO.php");
//atributos
class Producto {
    private $id;
    private $nombre;
    private $valor_unitario;
    private $cantidad;
    private $conexion;

    public function __construct() {
       $this->conexion = new ConexionPDO();
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of valor_unitario
     */ 
    public function getValor_unitario()
    {
        return $this->valor_unitario;
    }

    /**
     * Set the value of valor_unitario
     *
     * @return  self
     */ 
    public function setValor_unitario($valor_unitario)
    {
        $this->valor_unitario = $valor_unitario;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function crear()
    {
        $cadenasql = "INSERT INTO productos (nombre,valor_unitario,cantidad) VALUES ('{$this->getNombre()}',{$this->getValor_unitario()},{$this->getCantidad()})";//Valores vienen del objeto producto 
        $this->conexion->consultaPreparada($cadenasql);

    }

    public function obtener(){
        $cadenasql="SELECT * FROM productos";
        $listaproductos = $this->conexion->consultaPreparada($cadenasql);  
        return $listaproductos;   
    }

    public function obtenerUno(){
        $cadenasql="SELECT * FROM productos WHERE id = ?";
        $listaproductos = $this->conexion->consultaPreparada($cadenasql, [$this->getId()]);  
        return $listaproductos;   
    }
    
     public function editar(){
        
        $cadenasql="UPDATE productos SET nombre =? , valor_unitario=?, cantidad =? WHERE id =?";
        //valores del json, que envia el cliente(controlador).
        $valores=["{$this->getNombre()}",$this->getValor_unitario(), $this->getCantidad(),$this->getId()];
        $tipoValores ="sdi";
        $editarproductos = $this->conexion->consultaPreparada($cadenasql, $valores, $tipoValores); 
        return $editarproductos;

     }

     public function eliminar(){
        $cadenasql= "DELETE FROM productos WHERE id = ?";
        return $this->conexion->consultaPreparada($cadenasql,[$this->getId()]);
    }
}