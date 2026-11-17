<?php
$mensaje = "" ?? "";
$errores = [];

$nombre = "";
$anio = "";

if(isset($_POST['submit'])){
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $anio = trim(htmlspecialchars($_POST['anio']));

    if(empty($nombre)){
        $errores[] = "El nombre es obligatorio";
    } elseif (strlen($nombre) < 3){
        $errores[] = "El nombre debe tener al menos 3 caracteres";
    }

    $anioActual = 2026;

    if(empty($anio)){
        $errores[] = "El año es obligatorio";
    } elseif (is_nan($anio)){
        $errores[] = "El año debe ser numérico";
    } else {
        $anioInt = (int)$anio ?? "";
        if($anioInt > $anioActual || $anioInt < 1900){
            $errores[] = "El año debe estar entre 1900 y 2026";
        }
    }

    $edad = $anioActual-$anioInt;

    if(empty($errores)){
        $mensaje = "Hola $nombre, en $anioActual tienes $edad años";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="formularioSaludoEdad.php" method="post">
    <label for="nombre">Tu nombre</label>
    <input type="text" name="nombre" id="nombre"><br/><br/>

    <label for="anio">Año de nacimiento</label>
    <input type="number" name="anio" id="anio"><br/><br>

    <button type="submit" name="submit">Enviar datos</button>
</form>
<?= $mensaje?>
</body>
</html>
