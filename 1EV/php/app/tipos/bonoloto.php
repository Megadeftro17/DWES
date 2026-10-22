<?php
/**
 * Genera Números de Bonoloto
 * Generamos 5 números para la bonoloto
 * Importante es asegurar que los números no se puedan repetir
 */

$num1 = mt_rand(1, 49);

do {
    $num2 = mt_rand(1, 49);
} while ($num2 == $num1);

do {
    $num3 = mt_rand(1, 49);
} while ($num3 == $num1 || $num3 == $num2);

do {
    $num4 = mt_rand(1, 49);
} while ($num4 == $num1 || $num4 == $num2 || $num4 == $num3);

do {
    $num5 = mt_rand(1, 49);
} while ($num5 == $num1 || $num5 == $num2 || $num5 == $num3 || $num5 == $num4);

do {
    $num6 = mt_rand(1, 49);
} while ($num6 == $num1 || $num6 == $num2 || $num6 == $num3 || $num6 == $num4 || $num6 == $num5);

$numero_1 = sprintf("%02d", $num1);
$numero_2 = sprintf("%02d", $num2);
$numero_3 = sprintf("%02d", $num3);
$numero_4 = sprintf("%02d", $num4);
$numero_5 = sprintf("%02d", $num5);
$numero_6 = sprintf("%02d", $num6);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BONOLOTO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            padding: 20px;
        }

        fieldset {
            border: 2px solid #0a3622;
            border-radius: 10px;
            display: inline-block;
            padding: 20px;
            background-color: #ffffff;
        }

        legend {
            font-weight: bold;
            color: #0a3622;
        }

        .bonoloto {
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            margin: 10px;
            background-color: #ffffff;
            color: #000000;
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
            border: 2px solid #000000;
            border-radius: 50%; /* Hace que el elemento sea un círculo */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Sombra para darle profundidad */
        }

        h1 {
            color: #0a3622;
            font-size: 1.8em;
        }
    </style>
</head>
<body>
    <span class="bonoloto"><?= $numero_1 ?></span>
    <span class="bonoloto"><?= $numero_2 ?></span>
    <span class="bonoloto"><?= $numero_3 ?></span>
    <span class="bonoloto"><?= $numero_4 ?></span>
    <span class="bonoloto"><?= $numero_5 ?></span>
    <span class="bonoloto"><?= $numero_6 ?></span>
</body>
</html>
