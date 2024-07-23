<?php

class Aprendiz
{
    //atributos
    protected $nombre;
    private $edad;

    //metodos
    public function __construct($Nombre, $Edad)
    {
        $this->nombre = $Nombre;
        $this->edad = $Edad;
    }

    //getter setter
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEdad()
    {
        return $this->edad;
    }

    //sette
    public function setNombre($Nombre)
    {
        $this->nombre = $Nombre;
    }
} //fin de la clase

//instanciar la clase - o creando el objeto
$objAprendiz = new Aprendiz("Juan", 15);

//accediento a los atributos por medio del metodo get
echo $objAprendiz->getNombre();
echo "<br>";
echo $objAprendiz->getEdad();
//cambiamps el valor del atributo por medio del metodo set
$objAprendiz->setNombre("Ana");
echo "<br>Nuevo nombre" . $objAprendiz->getNombre();
