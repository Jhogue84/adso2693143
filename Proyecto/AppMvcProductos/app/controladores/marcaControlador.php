<?php

namespace App\Controladores;

use App\Modelos\Marca;

class MarcaControlador extends Controlador
{

    private $modeloMarca;
    public function __construct()
    {
        $this->modeloMarca = new Marca();
    }

    public function inicio()
    {
        $datos = $this->modeloMarca->listar();
        return $this->cargarVista("marcas/inicio", $datos);
    }

    public function inicioJson()
    {
        $datos = $this->modeloMarca->listar();
        return $this->cargarVista("marcas/inicio", $datos);
    }
    public function crear()
    {
        return $this->cargarVista("marcas/crear", ["title" => "AppMvc | Marcas - Adicionar"]);
    }
    public function insertar()
    {
        if ($_POST["nombre"]) {
            echo "<br>hay datos";
            $this->modeloMarca->setNombre($_POST["nombre"]);
            $this->modeloMarca->setDescripcion($_POST["descripcion"]);
            $this->modeloMarca->crear();
            //return $this->inicio();
            header("Location: marcas");
        }
    }
}
