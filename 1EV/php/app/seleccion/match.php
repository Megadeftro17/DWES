<?php
$mes = rand(1,12);
// Operador ternario
$nombre = $mes > 5 ? "año medio pasado" : "Año empezado";

// Match compara la variable con el valor a la izquierda (clave-valor)
$dias = match($mes){
    61,3,5,7,8,10,12=>"31",
    4,6,9,11=>"30",
    2=>"28 o 29",
    default=>"error",
};
$msj = "<h1>El mes $mes tiene $dias</h1>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Match</title>
</head>
<body>
    <?=$msj?>
</body>
</html>
