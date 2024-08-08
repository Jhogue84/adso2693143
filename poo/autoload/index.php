<?php

use Poo\Autoload\Carpeta1\PersonaController;
use Poo\Autoload\Carpeta2\PersonaModelo;

//require_once "carpeta1/PersonaController.php";
spl_autoload_register(function ($clase) {
    //echo $clase;
    //Poo\Autoload\Carpeta2\PersonaModelo
    $ruta_array = explode("\\", $clase);
    $ruta = $ruta_array[2] . "/" . $ruta_array[3] . ".php";
    require_once $ruta;
});

$persona = new PersonaModelo();
echo $persona->saludar();
echo "<br>";
$p = new PersonaController();
echo $p->saludar();
