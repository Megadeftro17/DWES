<?php

if(isset($_POST['submit'])){
    $patron = htmlspecialchars($_POST['patron']);
    $cadena = htmlspecialchars($_POST['cadena']);

    if (preg_match("#$patron",$cadena)){
        $msj = "La cadena $cadena cumple el patrón $patron";
    } else {
        $msj = "NOOOO La cadena $cadena NO cumple el patrón $patron";
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
<form action="index.php" method="post">
    Patrón <input type="text" name="patron" value="<?= $patron??"" ?>" id="">
    Cadena <input type="text" name="cadena" value="<?= $cadena??"" ?>" id="">

    <br>
    <button type="text" value="Evaluar" name="submit" id="">
</form>
<?= $msj??"" ?>
</body>
</html>
