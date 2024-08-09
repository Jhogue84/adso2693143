<?php

namespace App\Modelos;

class Usuario
{
    //atributo-propiedades
    private $id;
    private $nombres;
    private $apellidos;
    private $numIdentificacion;
    private $tipoIdentificacion;
    private $correo;
    private $usuario;
    private $clave;
    private $telefono;
    private $direccion;
    private $fechaRegistro;
    private $conexion;
    //metodos-funciones

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }

    //getter y setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNumIdentificacion()
    {
        return $this->numIdentificacion;
    }

    public function setNumIdentificacion($numIdentificacion)
    {
        $this->numIdentificacion = $numIdentificacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono2()
    {
        return $this->telefono;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;

        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    //create, upadete, delete

    public function crear()
    {
        //id 	nombres 	apellidos 	numIdentificacion 	tipoIdentificacion 	correo 	usuario 	clave 	telefono 	direccion 	fechaRegistro 	
        $cadenaSql = "INSERT INTO usuarios (nombres, apellidos, numIdentificacion, tipoIdentificacion, correo, usuario, clave, telefono, direccion, fechaRegistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $clave = password_hash($this->getClave(), PASSWORD_DEFAULT);
        $fechaRegistro = date("Y-m-d H:i:s");
        $values = ["{$this->getNombres()}", "{$this->getApellidos()}", $this->getNumIdentificacion(), $this->getTipoIdentificacion(), "{$this->getCorreo()}", "{$this->getUsuario()}", "$clave", "{$this->getTelefono()}", "{$this->getDireccion()}", "$fechaRegistro",];
        $tipoDatos = "ssiissssss";
        //insertar en la tabla usuarios.
        $this->conexion->consultaPreparada($cadenaSql, $values, $tipoDatos);
        //capturamos el id que se registro del usuario, en un arreglo en el indice 0.
        $idUsuario = $this->conexion->consultaPreparada("SELECT LAST_INSERT_ID()")->fetch_row();
        //capturamos el id del tipo usuario - Ajustar codigo, cuando crea el administrador un usuario.
        $idTipoUsuario = $this->conexion->consultaPreparada("SELECT id FROM tiposUsuarios WHERE nombre='Cliente';")->fetch_row();
        //insertar en la tabla usuariostiposusuarios.
        $cadenaSql = "INSERT INTO usuariostiposusuarios (idTipoUsuario, idUsuario, estado) VALUES(?,?,?)";
        $this->conexion->consultaPreparada($cadenaSql, [$idTipoUsuario[0], $idUsuario[0], 1], "iii");
        $this->conexion->desconectarse();
    }

    public function loguearse()
    {

        //obtener la clave 
        //$cadenaSql = "SELECT * FROM usuarios WHERE usuario = ?";
        $cadenaSql = "SELECT usu.nombres, usu.apellidos, usu.numIdentificacion, usu.tipoIdentificacion, usu.correo, usu.usuario, usu.clave, usutipusu.estado, tipusu.id, tipusu.nombre as tipoUsuario FROM usuariostiposusuarios usutipusu INNER JOIN usuarios usu ON usutipusu.idUsuario = usu.id inner JOIN tiposusuarios tipusu ON usutipusu.idTipoUsuario = tipusu.id WHERE estado = 1 AND usuario = ?";
        $datos = $this->conexion->consultaPreparada($cadenaSql, [$this->getUsuario()], "s")->fetch_assoc();
        if ($datos) {
            if (password_verify($this->getClave(), $datos["clave"])) {
                //echo 'La contraseña es válida!';
                return $datos;
            }
        }
    }
    // public function listById()
    // {
    //     $cadenaSql = "SELECT * FROM clientes WHERE id = $this->id";
    //     $resultado = $this->conectarse->consultaConRetorno($cadenaSql);
    //     $datos = $resultado->fetch_assoc();
    //     return $datos;
    // }

    // public function update()
    // {
    //     $cadenaSql = "UPDATE clientes SET numIdentificacion = '$this->numIdentificacion', nombreCompania = '$this->nombreCompania', nombreContacto = '$this->nombreContacto', direccion = '$this->direccion', email ='$this->email', telefono = '$this->telefono', telefono2 = '$this->telefono2', clave = '" .  md5($this->clave) . "' WHERE id = $this->id";
    //     $this->conectarse->consultaSinRetorno($cadenaSql);
    // }

    // public function delete()
    // {
    //     $cadenaSql = "DELETE FROM clientes WHERE id = $this->id";
    //     //echo $cadenaSql . "<br>";
    //     $this->conectarse->consultaSinRetorno($cadenaSql);
    // }
    // public function validateClient()
    // {
    //     $cadenaSql = "
    //     SELECT * FROM clientes WHERE numIdentificacion = $this->numIdentificacion AND clave= '" .  md5($this->clave) . "'";
    //     //echo $cadenaSql;
    //     $resultado = $this->conectarse->consultaConRetorno($cadenaSql);
    //     if ($resultado->num_rows > 0) {
    //         $datos = $resultado->fetch_assoc();
    //     } else $datos = NULL;

    //     return $datos;
    // }


}
