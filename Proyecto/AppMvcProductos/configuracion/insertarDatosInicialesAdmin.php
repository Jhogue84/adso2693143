<?php

use App\Modelos\ConexionBD;

require_once "../app/modelos/conexionBD.php";

$conexion = new ConexionBD();

//mejora crear tabla para insertar tipo de documentos por este medio.

//insertar perfiles o tipos de usuarios
$cadenaSql = "INSERT INTO tiposusuarios (nombre,descripcion) VALUES('Admin','administra la aplicacion'), ('Cliente','');";

$conexion->consultaPreparada($cadenaSql);

//insertar el administrador
$clave = password_hash("utilizar", PASSWORD_DEFAULT);
$fecha = date("Y-m-d H:i:s");
$datos = ["nombres" => "Jhonny", "apellidos" => "Guerrero", "numIdentificacion" => 85025424, "tipoIdentificacion" => 1, "correo" => "joguerrero@sena.edu.co", "usuario" => "Admin", "clave" => "$clave", "telefono" => "3163601029", "direccion" => "Calle 5 No 5-5", "fechaRegistro" => "$fecha"];

$campos = implode(",", array_keys($datos));
$valores = "'";
$valores .= implode("','", array_values($datos));
$valores .= "'";

$cadenaSql = "INSERT INTO usuarios ($campos) VALUES ($valores)";
$conexion->consultaPreparada($cadenaSql);
//capturamos el id del tipo usuario - Ajustar codigo, cuando crea el administrador un usuario.
$idTipoUsuario = $conexion->consultaPreparada("SELECT id FROM tiposUsuarios WHERE nombre='Admin';")->fetch_row();
//insertar en la tabla pivote -> usuariostiposusuarios
$id = $conexion->consultaPreparada("SELECT LAST_INSERT_ID()")->fetch_row();
$cadenaSql = "INSERT INTO usuariostiposusuarios (idtipousuario, idusuario, estado) VALUES ($idTipoUsuario[0],$id[0],1)";
$conexion->consultaPreparada($cadenaSql);
$conexion->desconectarse();
