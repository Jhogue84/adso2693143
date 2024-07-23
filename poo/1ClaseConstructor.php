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
}

//instanciar la clase
$objAprendiz = new Aprendiz("Juan", 15);
$objAprendiz2 = new Aprendiz("Ana", 25);
$objAprendiz3 = new Aprendiz("Maria", 18);
//accediento a los atributos
echo $objAprendiz->nombre;
echo "<br>";
echo $objAprendiz->edad;
echo "<br><br>";
echo $objAprendiz2->nombre;
echo "<br>";
echo $objAprendiz2->edad;
echo "<br>";
echo "<br>";
echo $objAprendiz3->nombre;
echo "<br>";
echo $objAprendiz3->edad;
