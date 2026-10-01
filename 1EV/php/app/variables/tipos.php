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
        <h2>Tipos de valores en php</h2>
        <ul>
            <li>Valores enteros</li>
            <li>Valores float</li>
            <li>Valores string</li>
            <li>Valores bool</li>
            <li>Valores null</li>
        </ul>
    </div>

    <!-- Sección para el resultado de PHP -->
    <div class="box">
        <h2>Resultado</h2>
        <hr>
        <?php
        $var = 5;
        $tipo = gettype($var);
        echo "<h3>La variable <span style='color: green'>$var</span> es de tipo <span style='color: green;'>$tipo</span></h3>";
        $var2 = 5.5;
        $tipo2 = gettype($var2);
        echo "<h3>La variable <span style='color: green'>$var2</span> es de tipo <span style='color: green;'>$tipo2</span></h3>";
        $var3 = "CADENA";
        $tipo3 = gettype($var);
        echo "<h3>La variable <span style='color: green'>$var</span> es de tipo <span style='color: green;'>$tipo3</span></h3>";
        $var3 = false;
        $tipo4 = gettype($var);
        echo "<h3>La variable <span style='color: green'>$var</span> es de tipo <span style='color: green;'>$tipo4</span></h3>";
        $var5 = null;
        $tipo5 = gettype($var5);
        echo "<h3>La variable <span style='color: green'>$var</span> es de tipo <span style='color: green;'>$tipo5</span></h3>";

        ?>
    </div>

</div>
</body>
</html>