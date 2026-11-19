<?php
$productosIniciales = [
    'cafe' => ['stock' => 50, 'precio' => 1.50],
    'tostada' => ['stock' => 30, 'precio' => 2.00],
    'zumo' => ['stock' => 20, 'precio' => 2.50],
];

if(isset($_POST['productos_json']) && !empty($_POST['productos_json'])){
    $productos = json_decode($_POST['productos_json'], true) ?? $productosIniciales;
} else {
    $productos = $productosIniciales;
}

$msg = "";

function pintarCarta(array &$productos):string
{
    $carta = "<ul>";

    foreach ($productos as $nombre => $datos){
        $stock = $datos['stock'];
        $precio = $datos['precio'];

        $carta .= "<li>$nombre ($precio €): $stock unidades</li>";
    }

    $carta .= "</ul>";

    return $carta;
}

function generarTicket(array &$productos):string
{
    $total = 0;
    $msg = "<h3><Ticket del pedido/h3>";
    foreach ($productos as $nombre => &$datos){
        $cantidadInput = (int)$_POST[$nombre];

        if($cantidadInput > 0 && $cantidadInput < $datos['stock']){
            $precio = $datos['precio'] ?? 1;
            $subtotal = $cantidadInput * $precio;
            $total += $subtotal;
            $msg .= "<p>$nombre: $cantidadInput * $precio = $subtotal €</p>";

            $datos['stock'] -= $cantidadInput;
        }
    }
    
    if($total > 0){
        $msg .= "<p>Total a pagar: $total €";
    } else {
        $msg .= "No has seleccionado ningun producto";
    }

    return $msg;
}

function generarStock(array $productos): string {
    $msg = "<h3>Stock Restante</h3><ul>";
    foreach ($productos as $nombre => $datos) {
        $stock = $datos['stock'];
        $msg .= "<li>$nombre -> quedan $stock unidades</li>";
    }
    $msg .= "</ul>";
    return $msg;
}


$opcion = $_POST['submit'] ?? '';

$msg = match ($opcion) {
    "Generar Ticket" => generarTicket($productos),
    "Ver Stock" => generarStock($productos),
    default => pintarCarta($productos),
};

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafeteria</title>
</head>
<body style="text-align: center;">
<h1>CAFETERIA</h1>
<form action="cafeteria.php" method="post">
    <label for="cafe">Café</label>
    <input type="number" name="cafe" id="cafe"><br><br>

    <label for="tostada">Tostada</label>
    <input type="number" name="tostada" id="tostada"><br><br>

    <label for="zumo">Zumo</label>
    <input type="number" name="zumo" id="zumo"><br><br>

    <input type="hidden" name="productos_json" value="<?=htmlspecialchars(json_encode($productos))?>">

    <input type="submit" name="submit" value="Generar Ticket">
    <input type="submit" name="submit" value="Ver Stock">

</form>

<hr>
<?=$msg?>
</body>
</html>
