<?php
// 2. Leemos el array de accesos que viene por POST (o array vacío si es el primer acceso)
$accesos = $_POST['accesos'] ?? [];

if (isset($_POST['submit'])) {
    $nombre = trim($_POST['nombre']);

    // Solo procesamos si el usuario ha escrito un nombre
    if ($nombre !== "") {
        // Sumamos 1 si ya existe, o lo inicializamos a 1
        if (isset($accesos[$nombre])) {
            $accesos[$nombre]++;
        } else {
            $accesos[$nombre] = 1;
        }
    }
}

$inputs = "";
$msj = "";
// 3. Generamos el HTML a partir del array acumulado
foreach ($accesos as $usr => $total) {
    $inputs .= "<input type='hidden' name='accesos[$usr]' value='$total'>\n";

    // Preparamos el mensaje
    $plural = ($total === 1) ? "" : "s";
    $msj .= "<h2>$usr ha realizado $total click$plural</h2>\n";
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clics por usuario</title>
</head>
<body>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br/>

    <!-- Imprimimos los inputs ocultos -->
    <?= $inputs ?>

    <input type="submit" name="submit" value="Click aquí">
</form>

<!-- Imprimimos el resultado con los mensajes acumulados -->
<?= $msj ?>

</body>
</html>