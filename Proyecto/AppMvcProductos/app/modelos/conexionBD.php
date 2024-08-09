<?php

namespace App\Modelos;

require_once "../configuracion/datosBD.php";

use mysqli;

class ConexionBD
{
    //atributos
    private $servidor = BD_SERVIDOR;
    private $usuario = BD_USUARIO;
    private $clave = BD_CLAVE;
    private $bd = BD_NOMBRE;
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
            var_dump($values);
            $sqlPreparada->bind_param($tipoDatos, ...$values);
            $sqlPreparada->execute();
            $resultado = $sqlPreparada->get_result();
        } else {
            $resultado = $this->conexion->query($cadenaSql);
        }
        return $resultado;
    }
}
