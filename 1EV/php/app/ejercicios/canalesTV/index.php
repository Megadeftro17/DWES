<?php
require_once "./controller/controlador.php";
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV</title>
</head>
<body>
<form action="" method="post">
    <h1>Canales de TV</h1>
    <label for="cat">Selecciona una categoría:</label>
    <select name="categoria_index" id="cat">
        <?= $opciones ?>
    </select>
    <input type="submit" value="Ver Canales" name="btn_submit">
</form>

<?= $imagenes ?>
</body>
</html>
