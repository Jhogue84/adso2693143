<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : "Page 404"; ?></title>
    <link rel="stylesheet" href="/appmvcproductos/public/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg">

    <ul class="navbar-nav m-3 gap-3">
        <li class="nav-item"><a href="/appmvcproductos/public/principal">Inicio</a></li>
        <li class="nav-item"><a href="/appmvcproductos/public/categorias">Categorias</a></li>
        <li class="nav-item"><a href="/appmvcproductos/public/marcas">Marcas</a></li>
        <li class="nav-item"><a href="/appmvcproductos/public/productos">Productos</a></li>
        <li class="nav-item"><a href="/appmvcproductos/public/clientes">Clientes</a></li>

    </ul>
    <div class="navbar-nav gap-3 ms-5">
        <?= $_SESSION["usuario"] . " | " . $_SESSION["tipoUsuario"] ?>
        <li class="nav-item"><a href='/appmvcproductos/public/usuarios/desloguearse'>Salir</a></li>
    </div>
</nav>

<body>
    <div class="container">
        <!--INICIO, aqui se se mostrara el resto del html-->