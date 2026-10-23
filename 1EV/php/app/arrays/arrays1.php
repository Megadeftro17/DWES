<?php
/**
 * Dos formas de declarar un array vacío
 * $notas = [];
 * $notas = array();
 */

$notas = ["A"=>"a","B"=>"b","C"=>"c","D"=>"d"];
for($i = 0; $i < 10; $i++){
    // NO HAY QUE PONER EL ÍNDICE
    $notas[] = rand(0,10);
}
// Posicion 100 = 4
$notas[100] = 4;
// Posicion 101 = 5
$notas[] = "Valor en posición 101";
var_dump($notas);


// ### Para borrar posiciones ### \\\
unset($notas[100]);
unset($notas[101]);
var_dump($notas);

$notas[] = "Valor en la posición 102";
var_dump($notas);

// ### ESTOY HACIENDO UNA ASIGNACIÓN NUEVA ### \\\
$notas = [1,1,2];
var_dump($notas);
?>