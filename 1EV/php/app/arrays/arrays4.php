<?php
//$numeros = [1,4,65,7];
//
//$numeros[] = 12;
//var_dump($numeros);
//array_push($numeros,5,2,10);
//var_dump($numeros);
//array_unshift($numeros,1,4,65,7);
//var_dump($numeros);
//array_splice($numeros,3,0,[13,3,4,5]);

/**
 * Crear un array de 4 elementos
 * Añadir 2 al principio y 2 al final con la función correspondiente
 * Añadir lo mismo con la función sl
 */
$numbers = [1,2,3,4];
var_dump($numbers);
array_push($numbers,5,6,7);
var_dump($numbers);

// AÑADIR AL PRINCIPIO
array_splice($numbers,0,0,[10,11,12]);
var_dump($numbers);

// AÑADIR AL FINAL
$siz = sizeof($numbers);
array_splice($numbers,$siz,0,[90,91,92]);
var_dump($numbers);
?>