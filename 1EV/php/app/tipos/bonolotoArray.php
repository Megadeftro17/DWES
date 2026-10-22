<?php
/**
 * Genera Números de Bonoloto
 * Generamos 6 números para la bonoloto
 * Importante es asegurar que los números no se puedan repetir
 */

// Array con los numeros
$numbers = [];

while(count($numbers) < 6){
    $randNumb = mt_rand(1,49);

    // Si no está en el array ($numeros) el valor ($randNumb)
    if(!in_array($randNumb, $numbers)){
        // Añadimos el array
        $numbers[] = $randNumb;
    }
}

$html_bolas = "";
foreach ($numbers as $num){
    $formatNumb = sprintf("%02d",$num);
    $html_bolas .= "<span class='bonoloto'>$formatNumb</span>";
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BONOLOTO ARRAY</title>
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
    <?= $html_bolas ?>
</body>
</html>
