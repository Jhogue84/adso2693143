<?php

class Aprendiz
{
    //atributos
    public $nombre;
    public $edad;

    //metodos
    public function __construct($Nombre, $Edad)
    {
        $this->nombre = $Nombre;
        $this->edad = $Edad;
    }

    public function saludar()
    {
        echo "Saludando aprendiz ";
    }

    public function presentarPruebas($materia)
    {
        echo "Realizando prueba : " . $materia;
    }
} //fin de la clase

//instanciar la clase - o creando el objeto
$objAprendiz = new Aprendiz("Juan", 15);

//accediento a los metodos
$objAprendiz->saludar();
echo "<br>";
$objAprendiz->presentarPruebas("Php");
