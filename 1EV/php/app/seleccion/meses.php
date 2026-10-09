<?php
/**
 * EJERCICIO SWITCH MESES
 * Mostrando numero de días
 * 1,3,5,7,8,10,12
 * 2 (28-29)
 * 4,6,9,11
 */

$numMesRandom = rand(0,11);
// meses = Enero=>[0], Febrero=>[1], Marzo=>[2], Abril=>[3]....
$meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$resultado = "";
switch ($numMesRandom){
    case 0:
    case 2:
    case 4:
    case 6:
    case 7:
    case 9:
    case 11:
        $resultado = $meses[$numMesRandom]." tiene 31 dias";
        break;
    case 1:
        $resultado = $meses[$numMesRandom]." tiene 28-29 dias";
        break;
    case 3:
    case 5:
    case 8:
    case 10:
        $resultado = $meses[$numMesRandom]." tiene 30 dias";
        break;
    default:
        $resultado = "No existe ese mes";
        break;
}
echo "<h4>DATOS STRING</h4>====================================";
var_dump($meses);
var_dump($numMesRandom);
echo "===================================";
echo "<h1>El mes: ".($numMesRandom+1).", ".$resultado."</h1>";