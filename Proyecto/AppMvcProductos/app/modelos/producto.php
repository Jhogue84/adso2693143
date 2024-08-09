<?php

namespace App\Modelos;

class Producto
{
    //atributos
    private $id;
    private $idMarca;
    private $idCategoria;
    private $codigo;
    private $nombre;
    private $stock;
    private $vrUnitarioVenta;
    private $vrUnitarioCompra;
    private $urlImagen;
    private $descripcion;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }

    //GETTER Y SETTER
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIdMarca()
    {
        return $this->idMarca;
    }

    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getVrUnitarioVenta()
    {
        return $this->vrUnitarioVenta;
    }

    public function setVrUnitarioVenta($vrUnitarioVenta)
    {
        $this->vrUnitarioVenta = $vrUnitarioVenta;

        return $this;
    }

    public function getVrUnitarioCompra()
    {
        return $this->vrUnitarioCompra;
    }

    public function setVrUnitarioCompra($vrUnitarioCompra)
    {
        $this->vrUnitarioCompra = $vrUnitarioCompra;

        return $this;
    }

    public function getUrlImagen()
    {
        return $this->urlImagen;
    }

    public function setUrlImagen($urlImagen)
    {
        $this->urlImagen = $urlImagen;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    //CREATE
    public function crear()
    {
        //idMarca 	idCategoria 	codigo 	nombre 	stock 	vrUnitarioVenta 	vrUnitarioCompra 	urlimagen 	descripcion 	
        $cadenaSql = "INSERT INTO productos (idMarca, idCategoria, codigo, nombre, stock, vrUnitarioVenta, vrUnitarioCompra, urlimagen, descripcion) VALUES(?,?,?,?,?,?,?,?,?)";
        $datos = [$this->getIdMarca(), $this->getIdCategoria(), $this->getCodigo(), $this->getNombre(), $this->getStock(), $this->getVrUnitarioVenta(), $this->getVrUnitarioCompra(), $this->getUrlImagen(), $this->getDescripcion()];
        $this->conexion->consultaPreparada($cadenaSql, $datos, "iissiddss");
        $this->conexion->desconectarse();
    }

    //READ
    public function listar()
    {
        $cantidadRegistros = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $cadenaSql = "SELECT SQL_CALC_FOUND_ROWS * FROM productos LIMIT " . ($pagina - 1) * $cantidadRegistros . ", {$cantidadRegistros}";
        $datos = $this->conexion->consultaPreparada($cadenaSql)->fetch_all(MYSQLI_ASSOC);
        $totalRegistros = $this->conexion->consultaPreparada("SELECT FOUND_ROWS() AS totalRegistros")->fetch_assoc();
        $totalPaginas = ceil($totalRegistros["totalRegistros"] / $cantidadRegistros);
        return [
            "cantidadRegistros" => $cantidadRegistros,
            "totalRegistros" => $totalRegistros["totalRegistros"],
            "totalPaginas" => $totalPaginas,
            "title" => "App| Producto - Crear",
            "registros" => $datos
        ];
    }
}
