<?php

use App\Modelos\Categoria;

$categoriaModelo = new Categoria();
$categoriaModelo->setId($datos["id"]);
$categoriaModelo->eliminar();
header("Location: ../../categorias");
