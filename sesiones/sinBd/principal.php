<?php
session_start();

echo "Bienvenido: " . $_SESSION["nombreUsuario"];
echo "<br>";
echo "Perfil: " . $_SESSION["perfil"];
echo "<br>";
echo "correo: " . $_SESSION["correo"];

echo "<br><a href='cerrarSesion.php'>Cerrar Sesion</a>";
