<?php
$valores = [5,6,7,8,9];

$cuadrado = function ($n){
    return $n*$n;
};

$valoresCuadrado = array_map($cuadrado,$valores);

//var_dump($valores);
//var_dump($valoresCuadrado);

/**
 * ###########################################################
 * #1 Rellenar el array con 10 numeros aleatorios
 * LA FUNCION APARTE Y LA VARIABLE TAMBIÉN
 * ###########################################################
 */
$notas = array_fill(0,10,0);
function inicializa(){
    return rand(1,10);
}

$notas = array_map('inicializa',$notas);

//var_dump($notas);

/**
 * ###########################################################
 * #2 Rellenar el array con 10 numeros aleatorios
 * LA FUNCION DENTRO DE LA VARIABLE
 * ###########################################################
 */
$notas = array_map(function (){
    return rand(1,10);
}, $notas);

//var_dump($notas);

/**
 * ###########################################################
 * #3 Rellenar el array con 10 numeros aleatorios
 * VARIABLE CON FUNCION INTERIOR
 * ###########################################################
 */
$inicializa = function (){
    return rand(1,10);
};

$notas = array_map($inicializa,$notas);
//var_dump($notas);

/**
 * ###########################################################
 * #4 Rellenar el array con 10 numeros aleatorios
 * con funciones flecha (NO PUEDE TENER VARIAS INSTRUCCIONES)
 * ###########################################################
 */
$inicializa = fn() => rand(1,10);

$notas = array_map($inicializa,$notas);
var_dump($notas);


$min = min($notas);             // Valor minimo
$max = max($notas);             // Valor maximo
$size = sizeof($notas);         // Tamaño del array
$cnt = count($notas);           // Tamaño del array
$total = array_sum($notas);     // Total de la suma
$avg = $total/$size;            // Media de la suma total

var_dump($min,$max,$avg);
?>