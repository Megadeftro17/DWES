<?php

$opt = $_POST["submit"] ?? null;
var_dump($opt);
$msg = "Esperando...";

switch ($opt) {
    case "Enviar":
        $msg = "Has pulsado enviar";
        break;
    case "Primero":
        $msg = "Has pulsado primero";
        break;
    case "Imprimir":
        $msg = "Has pulsado imprimir";
        break;
    case "Saludar":
        $msg = "Has pulsado saludar";
        break;
    case "Entrar":
        $msg = "Has presionado del 1.php Entrar";
        break;
    case "Salir":
        $msg = "Has pulsado Salir";
        break;
    default:
        $msg = "Pues error";
        break;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SELF</title>
</head>
<body>
<h1><?=$msg?></h1>
    <form action="self.php" method="post">
        <input type="submit" value="Enviar" name="submit">
        <input type="submit" value="Primero" name="submit">
        <input type="submit" value="Imprimir" name="submit">
        <input type="submit" value="Saludar" name="submit">
        <input type="submit" value="Entrar" name="submit">
        <input type="submit" value="Salir" name="submit">
    </form>
</body>
</html>
