<?php
$filas = "";
for ($i = 32; $i <= 127; $i++){
    $filas .= sprintf("<tr>
                                        <td>%d</td>
                                        <td>%04b</td>
                                        <td>%o</td>
                                        <td>%X</td>
                                        <td>%c</td>
                              </tr>",$i,$i,$i,$i,$i);
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
                <!-- Enunciado breve -->
                <h2>Tabla ASCII y de números (con printf)</h2>
                <ul>
                    <!-- <li>Items enunciado</li> -->
                </ul>
            </div>

            <!-- Sección para el resultado de PHP -->
            <div class="box">
                <h2>Resultado</h2>
                <hr>
                <table border="1">
                    <tr>
                        <th>Decimal</th>
                        <th>Binario</th>
                        <th>Octal</th>
                        <th>Hexadecimal</th>
                        <th>ASCII</th>
                    </tr>
                    <?= $filas?>
                </table>
            </div>

        </div>
    </body>
</html>