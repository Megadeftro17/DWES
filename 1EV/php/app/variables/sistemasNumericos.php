<?php
$filas = "";
for ($i = 0; $i <= 15; $i++) {
    $bin = decbin($i);
    $oct = decoct($i);
    $hex = dechex($oct);
    $filas .= "<tr>";
    $filas .= "<td>$i</td>";
    $filas .= "<td>".decbin($i)."</td>";  // ### Es correcto pero poco legible ### //
    $filas .= "<td>$oct</td>";
    $filas .= "<td>$hex</td>";
    $filas .= "</tr>";
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejemplo de PHP en HTML</title>
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <div class="container">
            <div class="box">
                <h2>Tabla de diferentes sistemas numéricos</h2>
                <ul>
                    <li>16 filas</li>
                    <li>4 columnas</li>
                    <li>Decimal</li>
                    <li>Binario</li>
                    <li>Octal</li>
                    <li>Hexadecimal</li>
                </ul>
            </div>

            <!-- Sección para el resultado de PHP -->
            <div class="box">
                <h2>Resultado</h2>
                <hr>
                <table border="1px">
                    <tr>
                        <th>Decimal</th>
                        <th>Binario</th>
                        <th>Octal</th>
                        <th>Hexadecimal</th>
                    </tr>
                    <!-- ES LO MISMO QUE PONER '< ?php echo...' -->
                    <?= $filas?>
                    <!-- ### php normal ###
                    < ?php
                    echo $filas;
                    ?>
                    -->
                </table>
            </div>

        </div>
    </body>
</html>