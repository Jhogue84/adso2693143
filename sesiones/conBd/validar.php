<?php

$conexion = new mysqli("localhost", "root", "", "usuariosclaves");

if (isset($_POST["registrarse"])) {
    echo "registrarse";
} else {
    echo "Iniciar Sesion";
}
