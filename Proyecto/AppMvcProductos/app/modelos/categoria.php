<?php

namespace App\Modelos;

class Categoria
{
    //atributos
    private $id;
    private $nombre;
    private $descripcion;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }
    //CRUD - Read, listar ver todos los registros
    public function listar()
    {
        $cantidadRegistros = 4; //cantidad registros por pagina
        //capturar la variable llamada 'pagina', en la url se mirara asi: /categorias?pagina=x
        //si no hay pagina por defecto le damos el valor de 1.
        $pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : 1;
        $cadenaSql = "SELECT SQL_CALC_FOUND_ROWS * FROM categorias LIMIT " . ($pagina - 1) * $cantidadRegistros . ", {$cantidadRegistros}";
        $datos = $this->conexion->consultaPreparada($cadenaSql)->fetch_all(MYSQLI_ASSOC);
        //otros datos a enviar
        $totalRegistros = $this->conexion->consultaPreparada("SELECT FOUND_ROWS() AS totalRegistros")->fetch_row();
        $totalPaginas = ceil($totalRegistros[0] / $cantidadRegistros);
        //mejorar, enviando algunos otros datos como total de registros, total paginas, entre otros para mejorar la paginacion.
        $this->conexion->desconectarse();
        return [
            "totalPaginas" => $totalPaginas,
            "totalRegistros" => $totalRegistros[0],
            "title" => "Categorias",
            "registros" => $datos
        ];
    }

    public function listarInicial()
    {
        //crear la cadena SQL para la consulta
        $cadenaSql = "SELECT * FROM categorias ORDER BY nombre";
        //guardarmos los datos o los resultados de la consulta, en un arreglo asociativo llamado datos.
        //En este caso solo enviamos la consulta sin datos y sin tipo de datos.
        $datos = $this->conexion->consultaPreparada($cadenaSql)->fetch_all(MYSQLI_ASSOC);
        //nos desconectamos de la base de datos.
        $this->conexion->desconectarse();
        //retornamos el arreglo asociativo.
        return [
            "title" => "Categorias | Ver",
            "registros" => $datos
        ];
    }

    //listar un solo registro.
    public function listarUno($id)
    {
        //crear la cadena SQL para la consulta
        $cadenaSql = "SELECT * FROM categorias WHERE id = ? ";
        //crear un arreglo, para enviar a la consulta preparada, que puede tener uno o varios valores.
        $values = [$id];
        //guardarmos los datos o los resultados de la consulta, en un arreglo asociativo llamado datos.
        // la letra "i", es tipo de dato, en este caso es 'integer'
        $datos = $this->conexion->consultaPreparada($cadenaSql, $values, "i")->fetch_assoc();
        //nos desconectamos de la base de datos.
        $this->conexion->desconectarse();
        //retornamos el arreglo asociativo.
        return $datos;
    }
    //CRUD - Create, crear un nuevo registros
    public function crear()
    {
        $cadenaSql = "INSERT INTO categorias (nombre, descripcion) VALUES (?,?)";
        //crear un arreglo, para enviar a la consulta preparada
        //que puede tener uno o varios valores.(en este caso 2 datos el nombre y la descripcion)
        $values = ["{$this->getNombre()}", "{$this->getDescripcion()}"];
        $this->conexion->consultaPreparada($cadenaSql, $values, "ss");
        //nos desconectamos sin devolver ningun dato.
        $this->conexion->desconectarse();
    }

    ////CRUD - Upadate, editar un registro.
    public function editar()
    {
        $cadenaSql = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?";
        $values = [$this->getNombre(), $this->getDescripcion(), $this->getId()];
        $this->conexion->consultaPreparada($cadenaSql, $values, "ssi");
        $this->conexion->desconectarse();
    }
    ////CRUD - Delete, eliminar un registro.
    public function eliminar()
    {
        $cadenaSql = "DELETE FROM categorias WHERE id = ?";
        $values = [$this->getId()];
        $this->conexion->consultaPreparada($cadenaSql, $values, "i");
        $this->conexion->desconectarse();
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
}
