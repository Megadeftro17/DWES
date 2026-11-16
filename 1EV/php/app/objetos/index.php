<?php

if(isset($_POST['submit'])){
    $carga  = fn($clase) => require_once ("./class/$clase.php");

    spl_autoload_register($carga);

    $op1 = new Racional(htmlspecialchars($_POST['op1']));
    $op2 = new Racional(htmlspecialchars($_POST['op2']));
    $operador = htmlspecialchars($_POST['operador']);
    $resultado = match ($operador) {
        '+' => $op1->sumar($op2),
        '-' => $op1->restar($op2),
        '*' => $op1->multiplicar($op2),
        '/' => $op1->dividir($op2),
    };

    $msj = "$op1 $operador $op2 = $resultado";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora</title>
</head>
<body>
<h1 style="text-align: center">=== CALCULADORA ===</h1>
<form action="index.php" method="post">
    <fieldset>
        <input type="text" name="op1" value='<?= $op1??"" ?>' id="">
        <select name="operador" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="op2" value='<?= $op2??"" ?>' id="">
        <button type="submit" value="submit" name="submit">Operar</button>
    </fieldset>
    <?= $msj??"" ?>
</form>
</body>
</html>