<?php

// Leer datos formulario
$nombre = $_POST["nombre"];
$password = $_POST["password"];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos</title>
</head>
<body>
    <h1>Estoy en datos</h1>
    <h2>Tu nombre es <?=$nombre?></h2>
    <h2>Tu nombre es <?=$password?></h2>
</body>
</html>
