<?php

namespace App\Controladores;

use App\Modelos\Categoria;

class CategoriaControlador extends Controlador
{
    //atributos
    private $categoriaModelo;
    //metodos
    public function __construct()
    {
        //instanciamos la clase categoria, y guadamos el objeto en el atributo "categoriaModelo".
        $this->categoriaModelo = new Categoria();
    }
    public function inicio()
    {
        //carga la vista inicial, listado de categorias
        $datos = $this->categoriaModelo->listar();
        return $this->cargarVista("categorias/inicio",  $datos);
    }

    public function ver($id)
    {
        //carga el detalle de un elemento
        $datos = $this->categoriaModelo->listarUno($id);
        //var_dump($datos);
        return $this->cargarVista("categorias/ver", $datos);
    }

    public function crear()
    {
        //carga el formulario
        return $this->cargarVista("categorias/crear", ["title" => "Categorias | Crear"]);
    }

    public function insertar()
    {
        //procesa el formulario de crear
        //construimos un objeto tipo "catetoria" con los datos del formulario     
        $this->categoriaModelo->setNombre($_POST["nombre"]);
        $this->categoriaModelo->setDescripcion($_POST["descripcion"]);
        //ejecutamos el metodo del modelo categoria.
        $this->categoriaModelo->crear();
        header("Location: categorias");
    }
    public function editar($id)
    {
        //carga el detalle de un elemento
        $datos = $this->categoriaModelo->listarUno($id);
        //carga el formulario de editar
        return $this->cargarVista("categorias/editar", $datos);
    }

    public function actualizar()
    {
        $this->categoriaModelo->setId($_POST["id"]);
        $this->categoriaModelo->setNombre($_POST["nombre"]);
        $this->categoriaModelo->setDescripcion($_POST["descripcion"]);
        //ejecutamos el metodo del modelo categoria.
        $this->categoriaModelo->editar();
        //$this->ver($_POST["id"]);
        header("Location: {$_POST["id"]}");
    }

    public function eliminar($id)
    {
        //$datoEliminado = $this->categoriaModelo->listarUno($id);
        echo "<br>metodo para eliminar $id<br>";
        //carga el detalle de un elemento
        $datos = $this->categoriaModelo->listarUno($id);
        $this->cargarVista("categorias/eliminar", $datos);
    }
}
