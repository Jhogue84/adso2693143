<?php

    require_once "../controladores/productocontrol.php";
    require_once "../modelos/producto.php";


    $productoControlador = new ProductoControl();
   
    $metodo = $_SERVER ["REQUEST_METHOD"];

    
    switch ($metodo) {
        case 'GET':
            if (isset($_GET['id'])) {
                $listaproductos = $productoControlador->obtenerUno($_GET["id"]);
                echo json_encode($listaproductos);
            }else{
                $listaproductos = $productoControlador->obtener();
                echo json_encode($listaproductos);
            }
            break;
        case 'POST':
            $productoControlador->crear();
            break;

        case 'PUT':
            $rta = $productoControlador->editar($_GET['id']);
            echo json_encode($rta);
            break;
        
        case 'DELETE':
            $rta = $productoControlador->eliminar($_GET['id']);
            echo json_encode($rta);
            break;

    }
    ?>
    
