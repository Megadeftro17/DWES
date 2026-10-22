<?php
/**
 * Cuando se actualice la página que se actualice la etiqueta del tamaño, color
 */

// echo "<h1 style='color:#FF1101'>Esto es un titlo de un color</h1>";

$size = mt_rand(1,6); // h1,h2,h3...h6
$red = mt_rand(0,255); // 00-FF
$green = mt_rand(0,255); // 00-FF
$blue = mt_rand(0,255); // 00-FF

// Pasar de decimal a hexadecimal
$hexaRed = sprintf('%02x',$red);
$hexaGreen = sprintf('%02x',$green);
$hexaBlue = sprintf('%02x',$blue);
// Se usa sprintf ya que el formato es necesario para mostrar 0 digitos y dechex($x) muestra solamente 1 o 2 caracteres


// Concatenar
$hexaColor = "#".$hexaRed.$hexaGreen.$hexaBlue;

$msj = " <h1> -------- Cuando se actualice la página que se actualice la etiqueta del tamaño, color -------- </h1>
    <h$size style='color:$hexaColor;'>Resultado colores</h$size>
    <h1>Tamaño: $size</h1>
    <h1>Rojo: $hexaRed ($red  en decimal)</h1>
    <h1>Verde: $hexaGreen ($green  en decimal)</h1>
    <h1>Azul: $hexaBlue ($blue  en decimal)</h1>";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?=$msj?>
</body>
</html>
