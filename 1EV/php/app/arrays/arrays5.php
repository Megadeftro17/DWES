<?php
$notas = array_fill(0,10,0);
$inicializa = fn() => mt_rand(1,10);
$notas = array_map($inicializa,$notas);

$notas[20] = 10;

/**
 * Bucle foreach
 */
foreach ($notas as $posicion => $valor) {
    echo "<h1>La nota ".($posicion+1)." vale $valor</h1>";
}
var_dump($notas);
?>
