<?php

use App\Controladores\CategoriaControlador;
use App\Controladores\InicioControlador;
use App\Controladores\MarcaControlador;
use App\Controladores\ProductoControlador;
use App\Controladores\UsuarioControlador;
use Libreria\Enrutador;

//modificado, ahora pasamos la ruta y un array(clase controlador,el metodo)
Enrutador::get("/", [InicioControlador::class, "inicio"]);
Enrutador::get("/401", [InicioControlador::class, "inicio"]);
//rutas para las vistas de categorias
Enrutador::get("categorias", [CategoriaControlador::class, "inicio"]);
Enrutador::get("categorias/crear", [CategoriaControlador::class, "crear"]);
Enrutador::get("categorias/editar/:id", [CategoriaControlador::class, "editar"]);
Enrutador::get("categorias/ver/:id", [CategoriaControlador::class, "ver"]);
Enrutador::post("categorias", [CategoriaControlador::class, "insertar"]); //cuando creo
Enrutador::post("categorias/ver/:id", [CategoriaControlador::class, "actualizar"]); //cuando edito
Enrutador::post("categorias/eliminar/:id", [CategoriaControlador::class, "eliminar"]); //cuando elimino
//rutas para las vistas de usuarios
Enrutador::get("usuarios/crear", [UsuarioControlador::class, "crear"]);
Enrutador::post("usuarios/crear", [UsuarioControlador::class, "insertar"]);
Enrutador::get("usuarios/login", [UsuarioControlador::class, "login"]);
Enrutador::post("usuarios/login", [UsuarioControlador::class, "loguearse"]);
Enrutador::get("principal", [UsuarioControlador::class, "principal"]); //logueado
Enrutador::get("usuarios/desloguearse", [UsuarioControlador::class, "desloguearse"]);
//rutas de marcas
Enrutador::get("marcas", [MarcaControlador::class, "inicio"]);
Enrutador::get("marcas/crear", [MarcaControlador::class, "crear"]);
Enrutador::get("marcas/editar/:id", [MarcaControlador::class, "editar"]);
Enrutador::get("marcas/ver/:id", [MarcaControlador::class, "ver"]);
Enrutador::post("marcas", [MarcaControlador::class, "insertar"]); //cuando creo
Enrutador::post("marcas/ver/:id", [MarcaControlador::class, "actualizar"]); //cuando edito
Enrutador::post("marcas/eliminar/:id", [MarcaControlador::class, "eliminar"]); //cuando elimino
//rutas de productos
Enrutador::get("productos", [ProductoControlador::class, "inicio"]);
Enrutador::get("productos/crear", [ProductoControlador::class, "crear"]);
Enrutador::get("productos/editar/:id", [ProductoControlador::class, "editar"]);
Enrutador::get("productos/ver/:id", [ProductoControlador::class, "ver"]);
Enrutador::post("productos", [ProductoControlador::class, "insertar"]); //cuando creo
Enrutador::post("productos/ver/:id", [ProductoControlador::class, "actualizar"]); //cuando edito
Enrutador::post("productos/eliminar/:id", [ProductoControlador::class, "eliminar"]); //cuando elimino

//obtener las diferentes rutas get y post
Enrutador::obtenerRuta();
