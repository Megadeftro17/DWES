<?php
function get_form($productos) {
    $html = "";

    foreach ($productos as $nombre => $datos) {
        $html = $html . "<label for='$nombre'>$nombre (".$datos['precio']."€)</label>";
        $html = $html . "<input type='text' name='$nombre' value='0'>";
    }

    $html .= "<button type='submit' name='submit' value='Comprar'>Comprar</button>";

    return $html;
}

function get_invoice($productos){
    $total = 0;
    $html = "<h3>Factura de compra</h3>";

    foreach ($productos as $nombre => $datos) {
        $cantidad = $_POST[$nombre] ?? 0; // PREVIENE NULOS

        if($cantidad > 0){
            $precio = $datos['precio'];
            $subtotal = $precio * $cantidad;

            $total += $subtotal;

            $html .= "<p>$nombre: $cantidad x $precio = $subtotal €</p>";
        }
    }

    if($total > 0){
        $html .= "<p class='exito'>Total a pagar: $total €</p>";
    } else {
        $html .= "<p class='error'>No has comprado nada.</p>";
    }

    return $html;
}

function get_report($productos) {
    $html = "<h3>Reporte de almacén</h3>";
    $html .= "<ul>";

    foreach($productos as $nombre => $datos) {
        $stockInicial = $datos['unidades'];
        $comprados = $_POST[$nombre] ?? 0;

        if($comprados > 0){
            $stockRestante = $stockInicial - $comprados;
            $html .= "<li>$nombre: $stockRestante (Habia: $stockInicial)</li>";
        } else {
            $html .= "<li>$nombre: $stockInicial</li>";
        }
    }

    $html .= "</ul>";

    $html .= "<a href=''><button type='button'>Hacer otra compra</button></a>";
    return $html;
}
?>