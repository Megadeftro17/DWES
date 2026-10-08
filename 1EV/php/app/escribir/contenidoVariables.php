<?php

// int(5)
$numero = 5;
var_dump($numero);

// array(7) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) [5]=> int(6) [6]=> int(7) }
echo "<h1>Ahora var_dumb</h1>";
$datos = [1,2,3,4,5,6,7];
var_dump($datos);

// Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 )
echo "<h1>Ahora print_r</h1>";
print_r($datos);
$valor_array = print_r($datos,true);

// Primero ejecuta var_dumb (no devuelve nada) y se muestra y luego va la cadena
// echo "<h1>Ahora el valor del array". var_dump($datos)." --FIN</h1>";

// Al ejecutar print_r y true devuelve valor gracias a print_r y se concatena
// echo "<h1>Ahora el valor del array". print_r($datos,true)." --FIN</h1>";
