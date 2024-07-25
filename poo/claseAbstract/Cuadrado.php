<?php

require_once "Figura.php";
class Cuadrado extends Figura
{

    private $base = 10;
    private $altura = 10;

    public function calcularArea()
    {
        return $this->base * $this->altura;
    }
}

$cuadrado = new Cuadrado();
echo $cuadrado->calcularArea();
