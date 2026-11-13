<?php

require './class/Racional.php';

try{
    $r1 = new Racional(5,8);
    $r2 = new Racional(6,0);
    echo "<h1>$r1+$r2</h1>";
}catch (Exception $e){
    echo "Error ".$e->getMessage();
}

echo "<h1>Valor de $r1 es $r1->value</h1>";