<?php

namespace App\Controladores;

class InicioControlador extends Controlador
{
    public function inicio()
    {
        return $this->cargarVista("inicio", ["title" => "Inicio | App-MVC ", "body" => "cuerpo enviado por el controlador"]);
    }
}
