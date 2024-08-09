<?php

namespace App\Modelos;

class Marca
{
    private $id;
    private $nombre;
    private $descripcion;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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
        $cadenaSql = "INSERT INTO marcas (nombre, descripcion) VALUES(?,?)";
        $this->conexion->consultaPreparada($cadenaSql, [$this->getNombre(), $this->getDescripcion()], "ss");
        $this->conexion->desconectarse();
    }

    //READ
    public function listar()
    {
        $cantidadRegistros = 5;
        $pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : 1;
        $cadenaSql = "SELECT SQL_CALC_FOUND_ROWS * FROM marcas LIMIT " . ($pagina - 1) * $cantidadRegistros . ",{$cantidadRegistros}";
        $datos = $this->conexion->consultaPreparada($cadenaSql)->fetch_all(MYSQLI_ASSOC);
        $totalRegistros = $this->conexion->consultaPreparada("SELECT FOUND_ROWS() AS totalRegistros")->fetch_row();
        $totalPaginas = ceil($totalRegistros[0] / $cantidadRegistros);
        $this->conexion->desconectarse();
        return [
            "totalPaginas" => $totalPaginas,
            "totalRegistros" => $totalRegistros[0],
            "title" => "Appmvc | Marcas ",
            "registros" => $datos
        ];
    }

    public function listarUno($id)
    {
        $cadenaSql = "SELECT * FROM marcas WHERE id=?";
        $datos = $this->conexion->consultaPreparada($cadenaSql, [$id], 'i')->fetch_assoc();
        $this->conexion->desconectarse();
        return $datos;
    }

    //UPDATE
    public function editar()
    {
        $cadenaSql = "UPDATE marcas SET nombre=?, descripcion=? WHERE id = ?";
        $this->conexion->consultaPreparada($cadenaSql, [$this->getNombre(), $this->getDescripcion(), $this->getId()], "ssi");
        $this->conexion->desconectarse();
    }
    //DELETE
    public function eliminar()
    {
        $cadenaSql = "DELETE FROM marcas WHERE id=?";
        $this->conexion->consultaPreparada($cadenaSql, [], "i");
        $this->conexion->desconectarse();
    }
}
