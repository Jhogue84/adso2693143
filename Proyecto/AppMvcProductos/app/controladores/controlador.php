<?php

namespace App\Controladores;

class Controlador
{
    //atributos

    //metodos
    public function cargarVista($nomArchivo, $datos = [])
    {
        //datos es un arreglo asociativo (clave=>valor)
        //extract convierte c/clave en una variable y le asigna el valor.
        //var_dump($datos);
        //require_once "../public/vistas/plantilla/headerAdmin.php";
        ($datos) ? extract($datos) : ["mensaje" => "No hay datos"];
        ob_start(); //inicia almacenamiento en buffer de salida(memoria), y no mostrara la salida.
        //require_once "../public/vistas/plantilla/header.php";
        if (count($_SESSION) > 0) {
            require_once "../public/vistas/plantilla/headerAdmin.php";
            require_once "../public/vistas/{$nomArchivo}.php";
        } else {
            require_once "../public/vistas/plantilla/header.php";

            $carpeta =  explode("/", $nomArchivo);
            if ($carpeta[0] === "categorias" || $carpeta[0] === "marcas") {
                $patron = "%^$carpeta[0](/\w+)?(/\w+)?%";
                preg_match($patron, $nomArchivo, $url);
            }

            switch ($nomArchivo) {
                case 'principal':
                case isset($url[0]):
                    require_once "../public/vistas/401.php";
                    break;
                default:
                    require_once "../public/vistas/{$nomArchivo}.php";
                    break;
            }
        }
        require_once "../public/vistas/plantilla/footer.php";
        $vista = ob_get_clean(); //obtiene el contenido del buffer y limpia.

        return $vista;
    }
}
