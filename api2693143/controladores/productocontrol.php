<?php 
require_once "../modelos/producto.php";

class ProductoControl{
    private $productomodelo;
    public function __construct(){ 
        $this->productomodelo = new Producto();

    }
    public function crear(){
        $datosjson = file_get_contents("php://input");
        $_POST=json_decode($datosjson,true);

        $this->productomodelo->setNombre($_POST["nombre"]);
        $this->productomodelo->setValor_unitario($_POST["valor_unitario"]);
        $this->productomodelo->setCantidad($_POST["cantidad"]);
        $this->productomodelo->crear();
        $respuesta=["mensaje"=>"Se inserto el Producto"];
        echo json_encode($respuesta);
    }

 public function obtener()
 {
    $listaproductos = $this->productomodelo->obtener();
    return $listaproductos;
 }

 public function obtenerUno($id)

 {
    $this->productomodelo->setId($id);
    $listaproductos = $this->productomodelo->obtenerUno();
    return $listaproductos;
 }
 public function editar($id){

    $datosjson = file_get_contents("php://input");   
    $_POST=json_decode($datosjson,true);
    
    $this->productomodelo->setId($id);
    $this->productomodelo->setNombre($_POST["nombre"]);
    $this->productomodelo->setCantidad($_POST["cantidad"]);
    $this->productomodelo->setValor_unitario($_POST["valor_unitario"]);
 
    $rta = $this->productomodelo->editar();

    if(count($rta)==0){
        $rta = ["mensaje"=>"Se edito el producto con id: {$id}"];
    };
    return $rta;
 }

 public function eliminar($id){
    $this->productomodelo->setId($id);
    $rta = $this->productomodelo->eliminar();
    
    if(count($rta)==0){
        $rta = ["mensaje"=>"Se elimino el producto con id: {$id}"];
    };
    return $rta;
 }

}