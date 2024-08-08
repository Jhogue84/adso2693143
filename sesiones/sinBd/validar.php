<?php

$_POST["usuario"];
$_POST["clave"];

session_start();

$_SESSION["nombreUsuario"] = $_POST["usuario"];
$_SESSION["perfil"] = "Administrador ADSO";
$_SESSION["correo"] = "adso@gmail.com";

//consulta a la base

header("Location: principal.php");
