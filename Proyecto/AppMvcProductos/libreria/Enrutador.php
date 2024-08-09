<?php

namespace Libreria;

use App\Controladores\InicioControlador;

class Enrutador
{
    //atributos
    private static $rutas = [];

    //metodo para agregar rutas tipo get  
    public static function get($url, $llamarFuncion)
    {
        $url = trim($url, "/");
        self::$rutas["GET"][$url] = $llamarFuncion;
    }
    //metodo para agregar rutas tipo post
    public static function post($url, $llamarFuncion)
    {
        $url = trim($url, "/");
        self::$rutas["POST"][$url] = $llamarFuncion;
    }
    //metodo para ver las rutas que se almacenaron en el atributo rutas que es array.
    public static function obtenerRuta()
    {
        $metodo = $_SERVER["REQUEST_METHOD"];
        $uri = $_SERVER["REQUEST_URI"];
        $posicionPublic = strpos($uri, "public");
        //borramos los slash al inicio al final de la ruta y extraemos ruta despues de la palabra public.
        $uri =  trim(substr($uri, $posicionPublic + 6), "/");
        foreach (self::$rutas[$metodo] as $ruta => $funcionCall) {
            $uri = trim($uri, "/");
            //inicio de paginacion, en la url se mirara asi: /categorias?pagina=x
            //extraemos "?pagina=x", para dejar la url funcional del enrutador.
            if (strpos($uri, '?')) {
                $uri = substr($uri, 0, strpos($uri, "?"));
            }
            //fin de paginacion
            //si hay ':' en la ruta, modificar la ruta asi:
            if (strpos($ruta, ":")) {
                //la ruta ahora tiene un subpatron, que sera comparado con la uri en la otra linea
                $ruta = preg_replace("#:[a-zA-Z0-9]+#", "([a-zA-Z0-9]+)", $ruta);
            }

            //valida la expresion-regular con la uri
            if (preg_match("%^$ruta$%", $uri, $coindiceRutaUri)) {
                //echo $uri;
                //creamos otro array desde el otro arreglo pero desde el inidce 1, por si enviamos mas variable por la url
                $misVariablesUrl = array_slice($coindiceRutaUri, 1);
                //comprobar si lo que se envio de rutasWeb ($funcionCall) es una funcion, o es array(clase controlador,el metodo)
                if (is_callable($funcionCall)) {
                    $respuesta = $funcionCall(...$misVariablesUrl); //enviamos todo el array(misVariablesUrl), y en rutasWeb recibirlo
                } else {
                    //es array, entonces -> instanciar la clase InicioControlador
                    //$controlador = new InicioControlador();
                    //$controlador->inicio();
                    $controlador = new $funcionCall[0];
                    $respuesta = $controlador->{$funcionCall[1]}(...$misVariablesUrl);
                    //echo (is_array($respuesta) || is_object($respuesta)) ? json_encode($respuesta) : $respuesta;
                }
                //validar la respuesta capturada, si es un array/objeto codificar en un json, sino imprimir cadena de texto.
                echo (is_array($respuesta) || is_object($respuesta)) ? json_encode($respuesta) : $respuesta;
                return;
            }
        }
        if (count($_SESSION) > 0) {
            require_once "../public/vistas/plantilla/headerAdmin.php";
        } else {
            require_once "../public/vistas/plantilla/header.php";
        }
        echo "<br>No existe la pagina web. Error 404<br>";
        require_once "vistas/plantilla/footer.php";
    }
}
