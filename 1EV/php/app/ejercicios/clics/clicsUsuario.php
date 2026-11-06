<?php
/**
 * Programa que contabilice los clics que ha hecho cada usuario introducido por el input:
 * input1 = x --> "x" ha hecho 1 clic
 * input2 = y --> "y" ha hecho 1 clic
 * input3 = x --> "x" ha hehco 2 clics
 */
$nombresRecibidos = $_POST['nombres'] ?? [];
$nuevoNombre = $_POST['nombre'] ?? '';

// Si se apreta submit y ha introducido un nombre
if (isset($_POST['submit']) && $nuevoNombre !== '') {
    // Se añade el nombre al array
    $nombresRecibidos[] = $nuevoNombre;
}

// Los nombres recibidos los introducimos en el array
$inputsOcultos = "";
foreach ($nombresRecibidos as $nombre) {
    $inputsOcultos .= "<input type='hidden' name='nombres[]' value='$nombre'>\n";
}

// Contador de clics segun el usuario
$conteoClics = [];
foreach ($nombresRecibidos as $nombre) {
    // Si el contador de clics tiene ese nombre
    if (isset($conteoClics[$nombre])) {
        // Se suma 1 al contador de clics
        $conteoClics[$nombre]++;
    } else {
        // Se inicializa a 1
        $conteoClics[$nombre] = 1;
    }
}

// Imprimir el resultado
$listaResultados = "";
foreach ($conteoClics as $usuario => $total) {
    $plural = ($total === 1) ? '' : 's';
    $listaResultados .= "<li>$usuario ha hecho $total clic$plural</li>\n";
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador por Usuario</title>
</head>
<body>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <?= $inputsOcultos ?>

    <input type="submit" name="submit" value="Hacer Clic">
</form>

<h2>Resultado:</h2>
<ul>
    <?= $listaResultados ?>
</ul>

</body>
</html>