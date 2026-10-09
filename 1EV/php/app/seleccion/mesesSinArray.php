<?php
/**
 * EJERCICIO SWITCH MESES
 * Mostrando numero de días
 * 1,3,5,7,8,10,12
 * 2 (28-29)
 * 4,6,9,11
 */

$mes = rand(1, 15);
$nombre = null;
$resultado = "";
switch ($mes) {
    case 1:
        $nombre = $nombre == null ? "Enero" : $nombre;
    case 3:
        $nombre = $nombre == null ? "Marzo" : $nombre;
    case 5:
        $nombre = $nombre == null ? "Mayo" : $nombre;
    case 7:
        $nombre = $nombre == null ? "Julio" : $nombre;
    case 8:
        $nombre = $nombre == null ? "Agosto" : $nombre;
    case 10:
        $nombre = $nombre == null ? "Octubre" : $nombre;
    case 12:
        $nombre = $nombre == null ? "Diciembre" : $nombre;
        $dias = 31;
        break;
    case 2:
        $nombre = $nombre == null ? "Febrero" : $nombre;
        $dias = "28-29 dias";
        break;
    case 4:
        $nombre = $nombre == null ? "Abril" : $nombre;
    case 6:
        $nombre = $nombre == null ? "Junio" : $nombre;
    case 9:
        $nombre = $nombre == null ? "Septiembre" : $nombre;
    case 11:
        $nombre = $nombre == null ? "Noviembre" : $nombre;
        $dias = 30;
        break;
    default:
        $dias = false;
        break;
}

if ($dias) {
    $msj = "El mes $mes con nombre $nombre tiene $dias dias";
} else {
    $msj = "El mes $mes es incorrecto";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h2><?=$msj?></h2>
</body>
</html>
