<?php

use Poo\Namaspace\Carpeta1\Persona;
use Poo\Namaspace\Carpeta2\Persona as Persona2;

require_once "carpeta1/Persona.php";
require_once "carpeta2/Persona.php";



$persona = new Persona();
echo $persona->saludar();

echo "<br>";

$persona1 = new Persona2();
echo $persona1->saludar();
