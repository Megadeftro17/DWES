<?php
/**
 * Variable sumar es una función
 * @param $op1
 * @param $op2
 * @return mixed
 */
$sumar = function($op1,$op2){
    return $op1 + $op2;
};
echo "<h1>".var_dump($sumar)."</h1>";

/**
 * Funcion sumar que se podría declarar
 * @param $op1
 * @param $op2
 * @return mixed
 */
function sumar($op1,$op2){
    return $op1 + $op2;
}

echo "<h1>Valor de ".$sumar(4,5)."</h1>";

/*************************************************************************
 * Comprobar que la suma no es exacta con . flotante
 * ***********************************************************************/
$total = 0.1+0.2;

echo "<h1>$total</h1>";

if($total == 0.3){
    echo "<h1>SI normal</h1>";
} else {
    echo "<h1>NO 0.1 + 0.2 != 0.3</h1>";
}

/*************************************************************************
 * Comprobar que strlen si tiene caracteres especiales ocupan mas bytes
 * ***********************************************************************/

$nombre = "NIÑO";
$nombreTilde = "NIÑÓ";

$len = mb_strlen($nombre);
$lenTilde = strlen($nombreTilde);

echo "<h1>El nombre ''$nombre'' tiene $len caracteres</h1>";
echo "<h1>El nombre ''$nombreTilde'' tiene $lenTilde caracteres</h1>";
?>