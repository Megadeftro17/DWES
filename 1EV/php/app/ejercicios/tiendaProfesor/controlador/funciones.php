<?php

/**
 * Funcion para poner los caracteres en plural bien puesto
 * @param string $label
 * @return String
 */
function label_producto(string $label): String{
    $len = mb_strlen($label);
    $s = match ($label[$len -1]){
        's' => "",
        'a','e','i','o','u', 'á', 'é', 'í', 'ó', 'ú' =>"s",
        default=>"es",
    };

    $label = ucfirst($label);
    return "$label$s";
}


/**
 * Funcion para obtener el formulario de la tienda
 * @param array $productos
 * @return String
 */
function get_formulario_tienda(array $productos):String{
    $form ="";
    foreach ($productos as $producto => $detalle){
        $label_producto = label_producto($producto);

        $form .= <<<FIN
    <div class="form-group">
        <label id="producto">$label_producto</label>
        <input type="text" name="productos[$producto]" id="">
    </div>

FIN;
    }
    return $form;
}

/**
 * Funcion para validar la cantidad
 * @param string $cantidad
 * @return bool
 */
function valida_cantidad(string $cantidad):bool{
    return is_numeric($cantidad) && $cantidad >0;
}

/**
 * Funcion para obtener la factura
 * @param array $productos
 * @param array $compra
 * @return String
 */
function get_factura(array $productos, array $compra):String{
    $total = 0;
    $factura = "";
    foreach($compra as $producto => $unidades_compradas){
        if(!valida_cantidad($unidades_compradas)) continue;

        $precio = $productos[$producto]['precio'];
        $stock = $productos[$producto]['unidades'];
        $unidades_compradas = $unidades_compradas>$stock?$stock:$unidades_compradas;
        $subtotal = $unidades_compradas*$precio;
        $total += $subtotal;

        $factura .= "<hr><h1>Total a pagar</h1>$total €</hr>";
    }
    return $factura;
}


/**
 * Funcion para sacar el informe
 * @param array $productos
 * @param array $compra
 * @return String
 */
function get_informe(array $productos, array $compra):String{
    $informe = "";
    foreach($compra as $producto => $cantidad){
        $cantidad = valida_cantidad($cantidad) ? $cantidad : 0;
        $stock = $productos[$producto]['unidades'];
        $cantidad = $cantidad > $stock ? $stock : $cantidad;
        $stock -= $cantidad;

        $informe .= "<h2>De $producto quedan $stock unidades</h2>";
    }
    return $informe;
}
?>