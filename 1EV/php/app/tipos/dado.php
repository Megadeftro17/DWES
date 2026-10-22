<?php
/**
 * Tirar 6 millones de veces un dado y comprobar cuantas veces sale
 */

$one = 0;
$two = 0;
$three = 0;
$four = 0;
$five = 0;
$six = 0;

for($i = 0; $i < 6000000; $i++){
    $throw = mt_rand(1, 6);

    match($throw) {
        1 => $one++,
        2 => $two++,
        3 => $three++,
        4 => $four++,
        5 => $five++,
        6 => $six++,
        default => "ERROR",
    };
}

$msj = "<h1>El 1 aparece: $one veces</h1>"
    . "<h1>El 2 aparece: $two veces</h1>"
    . "<h1>El 3 aparece: $three veces</h1>"
    . "<h1>El 4 aparece: $four veces</h1>"
    . "<h1>El 5 aparece: $five veces</h1>"
    . "<h1>El 6 aparece: $six veces</h1>";
?>

<!doctype html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DADOS</title>
</head>
<body>
    <?=$msj?>
</body>
</html>