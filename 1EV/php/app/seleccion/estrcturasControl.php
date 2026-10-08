<?php
/**
 * $num = 5;
 * // if ($num) se convierte a binario y salvo 0 todos son TRUE
 * if ($num){
 *     echo "<h1>SI</h1>";
 * } else {
 *     echo "<h1>NO</h1>";
 * }
 * /


/**
 * EJERCICIO SWITCH EDADES
 * 0-3 => Bebe
 * 4-11 => Niña
 * 12-17 => Adolescente
 * 18-25 => Disfruta la vida
 * 26-60 => Responsabilidades
 * 61-90 => A descansar
 * 91-100 => Sortudo
 */
$edad = rand(0,100);
$etapa = "";

switch (true) {
    //switch ($edad)
    // 1er caso --> Se cumple la condición (true), pero 0 vale (false), se irá al default
    case ($edad >= 0 && $edad<=3):
        $etapa = "Bebe";
        break;
    case ($edad <= 11):
        $etapa = "Niña";
        break;
    case ($edad <= 17):
        $etapa = "Adolescente";
        break;
    case ($edad <= 25):
        $etapa = "Disfruta la vida";
        break;
    case ($edad <= 60):
        $etapa = "Responsabilidades";
        break;
    case ($edad <= 90):
        $etapa = "A descansar";
        break;
    case ($edad <= 100):
        $etapa ="Sortudo";
        break;
    default:
        echo "<h2>Mucha edad</h2>";
        break;
}
echo "<h1>EDAD: $edad</h1>";
echo "<h1>ETAPA: $etapa</h1>";

/**
 * EJERCICIO SWITCH MESES
 * Mostrando numero de días
 * 1,3,5,7,8,10,12
 * 2 (28-29)
 * 4,6,9,11
 */
?>