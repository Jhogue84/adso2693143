<?php

namespace App\Controladores;

use App\Modelos\Categoria;
use App\Modelos\Marca;
use App\Modelos\Producto;

class ProductoControlador extends Controlador
{
    private $modeloProducto;
    private Categoria $modeloCategoria;
    private $modeloMarca;

    public function __construct()
    {
        $this->modeloProducto = new Producto;
    }

    public function inicio()
    {
        //metodo para mostar el listado de productos
        //echo "listado de productos";
        $datos = $this->modeloProducto->listar();
        return $this->cargarVista("productos/inicio", $datos);
    }
    public function crear()
    {
        //el formulario necesita las marcas y categorias
        $this->modeloCategoria = new Categoria();
        $this->modeloMarca = new Marca();
        $datos = $this->modeloCategoria->listar();
        $datosCategorias = $datos["registros"];
        $datos = $this->modeloMarca->listar();
        $datosMarcas = $datos["registros"];

        //metodo para mostrar el formulario de crear proucto.
        return $this->cargarVista("productos/crear", ["title" => "App| Producto - Crear", compact('datosCategorias'), compact("datosMarcas")]);
    }

    public function insertar()
    {
        //idMarca 	idCategoria 	codigo 	nombre 	stock 	vrUnitarioVenta 	vrUnitarioCompra 	urlimagen 	descripcion

        $this->modeloProducto->setIdMarca($_POST["idMarca"]);
        $this->modeloProducto->setIdCategoria($_POST["idCategoria"]);
        $this->modeloProducto->setCodigo($_POST["codigo"]);
        $this->modeloProducto->setNombre($_POST["nombre"]);
        $this->modeloProducto->setStock($_POST["stock"]);
        $this->modeloProducto->setVrUnitarioVenta($_POST["vrUnitarioVenta"]);
        $this->modeloProducto->setVrUnitarioCompra($_POST["vrUnitarioCompra"]);
        $urlImagen = $this->subirImagen($_FILES);
        $this->modeloProducto->setUrlImagen($urlImagen);
        $this->modeloProducto->setDescripcion($_POST["descripcion"]);
        $this->modeloProducto->crear();
        header("Location: productos");
    }

    public function subirImagen($imagen)
    {

        $tamanioMax = 3000000; //3000kb - 3Mb
        $tmpImagen = $imagen["urlImagen"]["tmp_name"];
        $nomImagen = $imagen["urlImagen"]["name"];
        $tamanio = $imagen["urlImagen"]["size"];
        $formato = strtolower(pathinfo($nomImagen, PATHINFO_EXTENSION));

        $carpeta = "img/productos";
        $fecha = date("dmY-Hms");

        //validando el formato del archivo, tamaño y dandole un nombre y ruta para subir.
        if ($formato == "jpeg" || $formato == "jpg" || $formato == "png") {
            if ($tamanio > $tamanioMax) {
                echo "El archivo excede el peso permitido de 3 Mb";
            } else {
                $urlImagen = $fecha . "." . $formato;
                //subida al servidor
                if (move_uploaded_file($tmpImagen, "$carpeta/$urlImagen")) {
                    //echo "se guardo exitosamente";
                    return $urlImagen;
                } else {
                    echo "No se pudo subir la imagen";
                    return Null;
                }
            }
        } else {
            echo "El formato del archivo no es correcto";
            return Null;
        }
    }
}
