<?php

require_once "Figura.php";
class Circulo extends Figura
{

    private $radio = 10;

    public function calcularArea()
    {
        return 3.14 * ($this->radio) ** 2;
    }
}

$circulo = new Circulo();
echo $circulo->calcularArea();
