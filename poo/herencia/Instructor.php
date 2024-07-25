<?php

require_once "Persona.php";

class Instructor extends Persona
{
    private $profesion;

    public function __construct($nombre, $peso, $altura, $clave, $profesion)
    {
        parent::__construct($nombre, $peso, $altura, $clave);
        $this->profesion = $profesion;
    }
}
$instructor = new Instructor("Juan", 15, 5, "123", "Ing. sistemas");
var_dump($instructor);