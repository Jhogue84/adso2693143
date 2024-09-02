<?php 
require_once "../modelos/producto.php";

class ProductoControl{
    private $productomodelo;
    private $rutaImagen;
    public function __construct(){ 
        $this->productomodelo = new Producto();
        $this->rutaImagen = dirname(__DIR__) ."\imagenes\\";
    }
    public function crear(){
        $datosjson = file_get_contents("php://input");
        $_POST=json_decode($datosjson,true);

        $this->productomodelo->setNombre($_POST["nombre"]);
        $this->productomodelo->setValor_unitario($_POST["valor_unitario"]);

        $this->productomodelo->setCantidad($_POST["cantidad"]);
        
        //verificar imagen a insertar y subir 
        if(isset($_POST["imagen"]) || $_POST["imagen"] !==null){
            $imgArray = $this->validarImagen($_POST["imagen"]);//recibir mensjase (img codificada)
            $this->productomodelo->setImagen($imgArray["nomImagen"]);
        }else{
            $this->productomodelo->setImagen(null);
        }
        //fin verificar imagen
        $this->productomodelo->crear();
        $respuesta=["mensaje"=>"Se inserto el Producto"];
        echo json_encode($respuesta);
    }
    
    public function validarImagen($imagen64){
        //data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAg ....
        $imgBase64 = explode(";base64,", $imagen64)[1];//imagen
        $extencion = explode(";", $imagen64)[0];//data:image/png
        $extencion = explode("/", $extencion)[1];//png
        //subir archivo
        $fecha= Date("Ymd_Hms");
        $nomImagen = $fecha . "." .$extencion;
        $rutaImg = $this->rutaImagen . $nomImagen;
        $imgBase64 = base64_decode($imgBase64);
        file_put_contents($rutaImg, $imgBase64);
        //retornar mensaje
        $mensaje = "Imagen cargada al servidor";
        $imagenArray = ["smsImagen" => $mensaje, "nomImagen"=>$nomImagen];
        return $imagenArray;
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