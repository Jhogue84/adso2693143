<?php

namespace App\Controladores;

use App\Modelos\Usuario;

class UsuarioControlador extends Controlador
{
    //atributos
    private $usuarioModelo;
    //metodos
    public function __construct()
    {
        //instanciamos la clase categoria, y guadamos el objeto en el atributo "usuarioModelo".
        $this->usuarioModelo = new Usuario();
    }
    public function inicio()
    {
        //carga la vista inicial, listado de categorias
        //$datos = $this->usuarioModelo->listar();
        //return $this->cargarVista("categorias/inicio",  $datos);
        echo "Metodo controlador para cargar la lista de usuarios.";
    }

    public function ver($id)
    {
        //carga el detalle de un elemento
        //$datos = $this->usuarioModelo->listarUno($id);
        //var_dump($datos);
        //return $this->cargarVista("categorias/ver", $datos);
        echo "Metodo controlador para cargar o ver un usuario.";
    }

    public function crear()
    {
        //carga el formulario
        return $this->cargarVista("usuarios/crear");
        //echo "Metodo controlador para cargar formulario crear usuarios.";
    }
    public function insertar()
    {
        //procesa el formulario de crear
        $datos = $_POST;
        //var_dump($datos);
        extract($datos);
        //construimos un objeto tipo "usuario" con los datos del formulario
        $this->usuarioModelo->setNombres($nombres);
        $this->usuarioModelo->setApellidos($apellidos);
        $this->usuarioModelo->setNumIdentificacion($numIdentificacion);
        $this->usuarioModelo->setTipoIdentificacion($tipoIdentificacion);
        $this->usuarioModelo->setCorreo($correo);
        $this->usuarioModelo->setUsuario($usuario);
        $this->usuarioModelo->setClave($clave);
        $this->usuarioModelo->setTelefono($telefono);
        $this->usuarioModelo->setDireccion($direccion);
        //ejecutar metodo crear del modelo
        $this->usuarioModelo->crear();
        if ($btnCrear == "registrarse") {
            return $this->cargarVista("usuarios/login", ["title" => "AppMvc | Login ", "mensaje" => "Se ha registrado Satisfactoriamentes !!!!!"]);
        }

        //header("Location: usuarios");

    }
    public function editar($id)
    {
        //carga el detalle de un elemento
        // $datos = $this->usuarioModelo->listarUno($id);
        // //carga el formulario de editar
        // return $this->cargarVista("categorias/editar", $datos);
        echo "<br>Metodo controlador para cargar form editar usuarios.";
    }

    public function actualizar()
    {
        // $this->usuarioModelo->setId($_POST["id"]);
        // $this->usuarioModelo->setNombre($_POST["nombre"]);
        // $this->usuarioModelo->setDescripcion($_POST["descripcion"]);
        // //ejecutamos el metodo del modelo categoria.
        // $this->usuarioModelo->editar();
        // //$this->ver($_POST["id"]);
        // header("Location: {$_POST["id"]}");
        echo "Metodo controlador para cargar procesar form editar usuarios.";
    }

    public function eliminar($id)
    {
        //$datoEliminado = $this->usuarioModelo->listarUno($id);
        // echo "<br>metodo para eliminar $id<br>";
        // //carga el detalle de un elemento
        // $datos = $this->usuarioModelo->listarUno($id);
        // $this->cargarVista("categorias/eliminar", $datos);
        echo "Metodo controlador para cargar y procesar eliminacion de usuarios.";
    }

    public function login()
    {
        //carga el formulario
        //echo "carga formulario login";
        return $this->cargarVista("usuarios/login", ["title" => "AppMvc | Login "]);
    }
    public function loguearse()
    {
        $datos = $_POST;
        extract($datos);
        $this->usuarioModelo->setUsuario($usuario);
        $this->usuarioModelo->setClave($clave);
        //ejecutar metodo loguerse del modelo
        $datos = $this->usuarioModelo->loguearse();
        if ($datos) {
            session_start();
            $_SESSION["usuario"] = $datos["usuario"];
            $_SESSION["nombres"] = $datos["nombres"];
            $_SESSION["apellidos"] = $datos["apellidos"];
            $_SESSION["tipoUsuario"] = $datos["tipoUsuario"];
            //$this->cargarVista("principal", $datos);
            header("Location: ../principal");
        } else {
            $datos = ["mensaje" => "Usuario y/o clave incorrectos !!!"];
            return $this->cargarVista("usuarios/login", $datos);
        }
    }

    public function principal()
    {
        return $this->cargarVista("principal", ["title" => "AppMvc - Principal"]);
    }

    public function desloguearse()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /appmvcproductos/public");
    }

    public function accesoNoPermitido()
    {
        return $this->cargarVista("401", ["title" => "AppMvc - Acceso Restringido"]);
    }
}
