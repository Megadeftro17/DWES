<?php
// Leer valores formulario
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$operador = $_POST['operador'];

// Comprobar que no se divida por 0
if($op2 == 0 && $operador == "/" || $op1 == null || $op2 == null){
    $msj = "<h1>ERROR</h1>";
} else {
    $resultado = match ($operador) {
        '+' => $op1 + $op2,
        '-' => $op1 - $op2,
        '*' => $op1 * $op2,
        '/' => $op1 / $op2,
        default => null
    };

    if ($resultado !== null) {
        $msj = "<h2>Resultado: $op1 $operador $op2 = $resultado</h2>";
    } else {
        $msj= "<h2>Error</h2>";
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
    <title>Resultado Calculadora</title>
</head>
<body>
    <?=$msj?>
</body>
</html>
