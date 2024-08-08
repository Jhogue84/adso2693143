<?php

namespace App\Modelos;

use mysqli;

class ConexionBD
{
    //atributos
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $bd = "usuariosclaves";
    private $conexion;

    //metodos
    public function __construct()
    {
        $this->conectarse();
    }
    public function conectarse()
    {
        //mejora utilizar try catch
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bd);
        echo !$this->conexion->error ? "" : "Error de conexion a BD";
    }

    public function desconectarse()
    {
        $this->conexion->close();
        unset($this->conexion);
    }

    //consultas select insert, delete, update
    //consultas preparada evitar inyeccion sql.
    //enviamos valores y tiposDatos, cuando sean necesarios
    public function consultaPreparada($cadenaSql, $values = [], $tipoDatos = null)
    {
        if ($values) {
            $sqlPreparada = $this->conexion->prepare($cadenaSql);
            $sqlPreparada->bind_param($tipoDatos, ...$values);
            $sqlPreparada->execute();
            $resultado = $sqlPreparada->get_result();
        } else {
            $resultado = $this->conexion->query($cadenaSql);
        }
        return $resultado;
    }
}
