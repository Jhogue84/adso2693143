<?php

require_once "Persona.php";

class Aprendiz extends Persona
{
    //atributos propiedades
    private $ficha;

    //metodos
    public function __construct($ficha)
    {
        $this->ficha = $ficha;
    }
}

//instanciar 
$aprendiz = new Aprendiz(2693143);
var_dump($aprendiz);
$aprendiz->setNombre("Juan");
echo "<br>";
var_dump($aprendiz);
