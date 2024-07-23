<?php

// $miArray = [];

// echo gettype($miArray);

// //agregar elementos
// $miArray[] = 5;
// $miArray[] = 10;
// $miArray[] = 15;
// $miArray[5] = 20;

// echo $miArray[2];

// $miArray[0] = 500;
// echo "<br>";
// echo $miArray[0];
//arreglo o vectores -- 
//$arreglo = [2, 3, 5, 6, 9, 10];

$arreglo = array(
    array(2, 4, 6),
    array(11, 12, 13),
    array(20, 30, 40)
);

for ($fila = 0; $fila < count($arreglo); $fila++) {
    //var_dump($arreglo[$fila]);
    for ($col = 0; $col < count($arreglo[$fila]); $col++) {
        echo $arreglo[$fila][$col] . " - ";
    }
}
