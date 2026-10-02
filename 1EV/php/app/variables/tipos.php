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
        echo "<h3>la variable <span style='color:green'>$var</span> es de tipo  <span style='color:green'>$tipo</span></h3>";
        $var = 5.7;
        $tipo = gettype($var);
        echo "<h3>la variable <span style='color:green'>$var</span> es de tipo  <span style='color: green'>$tipo</span></h3>";
        $var = "hola caracola";
        $tipo = gettype($var);
        echo "<h3>la variable <span style='color:green'>$var</span> es de tipo  <span style='color:green'>$tipo</span></h3>";
        $var = true;
        $var = var_export($var, true);
        $tipo = gettype($var);
        echo "<h3>la variable <span style='color:green'>$var</span> es de tipo  <span style='color:green'>$tipo</span></h3>";
        $var = null;
        $tipo = gettype($var);
        echo "<h3>la variable <span style='color:green'>$var</span> es de tipo  <span style='color:green'>$tipo</span></h3>";


        ?>
    </div>

</div>
</body>
</html>