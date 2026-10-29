<?php

require 'funciones.php';

$productos = [
    'lechuga' => ['unidades' => 200, 'precio' => 0.90],
    'tomates' => ['unidades' => 2000, 'precio' => 2.15],
    'cebollas' => ['unidades' => 3200, 'precio' => 0.49],
    'fresas' => ['unidades' => 4800, 'precio' => 4.50],
    'manzanas' => ['unidades' => 2500, 'precio' => 2.10],
];

$opcion = $_POST["submit"] ?? null;
switch ($opcion) {
    case "Comprar":
        $invoice = get_invoice($productos);
        $report = get_report($productos);
        break;
    default:
        $form = get_form($productos);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIENDA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="tienda">
        <h2>Mi tienda de Verduras</h2>
        <?php if (isset($form)):?>
        <!-- GENERAR EL FORMULARIO -->
        <fieldset>
            <form action="" method="post">
                <legend>HAZ TU PEDIDO</legend>
                <?= $form?>
            </form>
        </fieldset>

        <?php else:?>
            <!-- MOSTRAR REPORTE -->
            <div class="factura">
                <?= $invoice?>
                <?= $report?>
            </div>
        <?php endif?>
    </div>
</body>
</html>
