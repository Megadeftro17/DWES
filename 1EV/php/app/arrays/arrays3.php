<?php
/**
 * Obtener todos los multiplos de 5 del 1 al 100 con arrayFilter
 */

// Todos los numeros del 1 al 100
$numeros = range(1,100);

// Funcion menos optimizada
/*$filtro = function ($n){
    if($n % 5 == 0) return true;
};*/

$filtro = fn($n) => $n % 5 == 0;

// Filtrar multiplos de 5
$multiplos5 = array_filter($numeros,$filtro);

var_dump($multiplos5);

/**
 * Array reduce
 */
$sumar = fn($a,$b) => $a+$b;
$suma = array_reduce($numeros,$sumar,0);
var_dump($suma);

/**
 * Multiplicar los multiplos de 5 de los 100 primeros numeros
 */
$numeros2 = range(1,100,);
$filtro2 = fn($n) => $n % 5 == 0;
$multiplos5_2 = array_filter($numeros2,$filtro2);

$multiplicar = fn($a,$b) => $a*$b;
$multiplicacion = array_reduce($multiplos5_2,$multiplicar,1);
var_dump($multiplicacion);

$numeros2 = range(1,100);
$multiplicar_multiplos5 = fn($a,$b) => ($b % 5 == 0)? $a*$b: $a;

$multiplicacion2 = array_reduce($numeros2,$multiplicar_multiplos5,1);
var_dump($multiplicacion2);
?>
