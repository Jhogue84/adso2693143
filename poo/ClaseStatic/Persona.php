<?php

//clase estatica
class Persona
{
    //atributos - propiedades
    public static $nombre = "Aprendiz FIjo";
    //metodos - funciones

    public function __construct()
    {
    }

    public static function saludar()
    {
        return "Hola buenas tardes soy metodo estatico " . self::$nombre;
    }
}

//$obj
//instanciar
// $obj = new Persona();
// echo $obj->saludar();
//sin instanciar

//echo Persona::saludar();