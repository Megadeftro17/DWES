<?php

require "./controlador/funciones.php";

$productos = [
    'lechuga' => ['unidades' => 200, 'precio' => 0.90],
    'tomates' => ['unidades' => 2000, 'precio' => 2.15],
    'cebollas' => ['unidades' => 3200, 'precio' => 0.49],
    'fresas' => ['unidades' => 4800, 'precio' => 4.50],
    'manzanas' => ['unidades' => 2500, 'precio' => 2.10],
];

$option = $_POST['submit'] ?? null;

switch ($option) {
    case 'Comprar':
        $compra = $_POST['productos'];
        $factura = get_factura($productos, $compra);
        $informe = get_informe($productos, $compra);
        break;
    default:
        $formulario_tienda = get_formulario_tienda($productos);
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
    <link rel="stylesheet" href="estilos/styles.css">
    <title>Document</title>
</head>
<body>
    <?php if (isset($formulario_tienda)):?>
    <fieldset class="tienda">
        <form action="index.php" method="post">
            <legend>Productos a comprar</legend>
            <?=$formulario_tienda?>
            <button type="submit" name="submit" value="Comprar">Comprar</button>
        </form>
    </fieldset>
    <?php else:?>
    <div>
        <fieldset>
            <legend>Factura</legend>
            <?=$factura?>
        </fieldset>
        <fieldset>
            <legend>Inventario</legend>
            <?=$informe?>
        </fieldset>
    </div>
    <?php endif;?>
</body>
</html>