<?php
/**
 * Declaro dos variables
 * Declaro una función que recibe dos parámetros
 * El primero por refrencia y el segundo por valor
 * Modifico los parámetros y miro el valor antes y después
 */

$nombre = "Mario";
$alias = &$nombre;
var_dump($nombre);

$nombre = "pedro";
var_dump($alias);

$numero2 = range(0,9);
$modifica = fn($n) => $n==10 ?10:$n+1;
$notas = array_map($modifica, $numero2);
var_dump($notas);
var_dump($numero2);

array_push($notas,1,1,5);
var_dump($notas);
?>