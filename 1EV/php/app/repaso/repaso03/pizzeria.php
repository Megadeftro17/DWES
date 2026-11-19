<?php
$pizzas = [
    'margarita'     => ['stock'=> 30,'precio' => 8.50],
    'cuatro_quesos' => ['stock'=> 20,'precio' => 10.00],
    'barbacoa'      => ['stock'=> 25,'precio' => 11.50],
    'carbonara'     => ['stock'=> 15,'precio' => 10.50],
];

$msg = "";

function mostrarCarta(array $pizzas):string
{
    $carta = "<h3>======= CARTA =======</h3>";
    $carta .= "<ul>";
    foreach($pizzas as $nombrePizza => $datos){
        $stock = $datos['stock'];
        $precio = $datos['precio'];

        $carta .= "<li>$nombrePizza ($precio): $stock unidades</li>";
    }

    $carta .= "</ul>";
    return $carta;
}

function generarFactura(array &$pizzas):string
{
    $factura = "<h3>======= FACTURA =======</h3>";
    $total = 0;

    foreach ($pizzas as $nombrePizza => $datos){
        $inputCantidad = (int)($_POST[$nombrePizza]) ?? 0;
        $precio = $datos['precio'];

        $total += $inputCantidad * $precio;
        $pizzas[$nombrePizza]['stock'] -= $inputCantidad;
        $stock = $datos['stock'];

        $factura .= "<p>$nombrePizza: $inputCantidad * $precio = $total ($stock uds restantes)</p>";
    }

    return $factura;
}

function generarReporte(array $pizzas):string
{
    $reporte = "<h3>======= REPORTE =======</h3>";
    foreach ($pizzas as $nombrePizza => $datos){
        $cantidad = $datos['stock'];

        $reporte .= "<p>$nombrePizza: $cantidad unidades restantes</p>";
    }

    return $reporte;
}

$opcion = $_POST['submit'] ?? '';

switch ($opcion) {
    case "Realizar Pedido":
        $msg .= generarFactura($pizzas);
        $msg .= generarReporte($pizzas);
        break;
    default:
        $msg .= mostrarCarta($pizzas);
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
    <title>Pizzeria</title>
</head>
<body style="text-align: center;">
<h1>PIZZERIA</h1>
<form action="pizzeria.php" method="post">
    <label for="margarita">Margarita</label>
    <input type="text" name="margarita" id="margarita"><br><br>

    <label for="cuatro_quesos">Cuatro Quesos</label>
    <input type="text" name="cuatro_quesos" id="cuatro_quesos"><br><br>

    <label for="barbacoa">Barbacoa</label>
    <input type="text" name="barbacoa" id="barbacoa"><br><br>

    <label for="carbonara">Carbonara</label>
    <input type="text" name="carbonara" id="carbonara"><br><br>

    <input type="submit" value="Realizar Pedido" name="submit">
</form>
<hr>
<?=$msg?>
</body>
</html>
