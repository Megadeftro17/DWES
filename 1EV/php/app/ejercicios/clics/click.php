<?php
// 1. Leemos el contador anterior si viene por POST; si no, empieza en 0
$clicks = $_POST['clicks'] ?? 0;

// 2. Si se pulsó el botón, incrementamos
if (isset($_POST['submit'])) {
    $clicks++;
} else {
    $clicks = 0;
}

// 3. Calculamos la gramática (0 clics, 1 clic, 2 clics)
$plural = ($clicks === 1) ? "" : "s";
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contador de Clics</title>
</head>
<body>
    <form action="click.php" method="post">
        <input type="text" name="Nombre" id=""><br />
        <input type="hidden" name="clicks" value="<?= $clicks ?>">
        <input type="submit" name="submit" value="Acceder">
    </form>

    <h2>Has hecho <?= $clicks ?> clic<?= $plural ?></h2>

</body>
</html>