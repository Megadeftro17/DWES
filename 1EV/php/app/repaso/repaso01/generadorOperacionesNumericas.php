<?php
$mensaje = "";
$errores = [];

$numero = "";
$numInt = "";

// --------------------------------------------------------------------------
//  FUNCIONES
// --------------------------------------------------------------------------

/**
 * Funcion que pinta la tabla de multiplicar
 * @param int $numInt
 * @return string
 */
function tablaMultiplicar(int $numInt):string{
    $html = "<h3>Tabla de multiplicar</h3><ul>";
    for($i = 0; $i <= 10; $i ++){
        $respuesta = (int)$numInt*$i;
        $html .= "<li>$numInt x $i =  $respuesta</li>";
    }
    $html .= "</ul>";
    return $html;
}

/**
 * Funcion para sumar desde 0 hasta el número
 * @param int $numInt
 * @return string
 */
function sumaAcumulada(int $numInt):string
{
    $html = "";
    $suma = 0;

    for($i = 0; $i <= $numInt; $i ++){
        $suma += $i;
    }
    $html .= "<p>La suma acumulada del 1 al $numInt es: $suma</p>";
    return $html;
}

/**
 * Funcion para ver si es par o impar
 * @param int $numInt
 * @return string
 */
function pares_impares(int $numInt):string {
    $pares = [];
    $impares = [];
    $html = "";

    $pares[] = 0;
    for($i = 1; $i <= $numInt; $i++){
        if($i % 2 == 0){
            $pares[] = $i;
        } else {
            $impares[] = $i;
        }
    }

    $html .= "Pares: ";
    foreach ($pares as $par){
        $html .= "$par   ";
    }
    $html .= "<br>Impares: ";
    foreach ($impares as $impar){
        $html .= "$impar   ";
    }

    return $html;
}

/**
 * Funcion para calcular el factorial
 * @param int $numInt
 * @return string
 */
function factorial(int $numInt):string{
    $html = "";
    $factorial = 1;
    for($i = 1; $i <= $numInt; $i++){
        $factorial *= $i;
    }

    $html .= "<p>El factorial de $numInt es: $factorial</p>";

    return $html;
}

/**
 * COMPROBAMOS QUE SE HA ENVIADO
 */
if(isset($_POST['submit'])){
    $numero = trim($_POST['numero'] ?? '');
    $operacion = $_POST['operaciones'] ?? '';


    // --------------------------------------------------------------------------
    //  VALIDACIÓN NUMERO BASICAS
    // --------------------------------------------------------------------------
    if($numero == ''){
        $errores[] = "El numero no puede estar vacío";
    } elseif (!is_numeric($numero)){
        $errores[] = "El numero no es un numero";
    } else {
        $numInt = (int)$numero;
        if($numInt < 1 || $numInt > 50){
            $errores[] = "El numero tiene que estar entre 1 y 50 incluidos";
        }
    }

    // --------------------------------------------------------------------------
    //  VALIDACIÓN OPERACIONES
    // --------------------------------------------------------------------------

    if(empty($operacion)){
        $errores[] = "Debes seleccionar una operacion valida";
    }

    // --------------------------------------------------------------------------
    //  SWITCH-CASE
    // --------------------------------------------------------------------------
    if(empty($errores)){
        $numInt = (int)$numero;
        switch ($operacion) {
            case 'tabla':
                $mensaje .= tablaMultiplicar($numInt);
                break;
            case 'suma':
                $mensaje .= sumaAcumulada($numInt);
                break;
            case 'pares_impares':
                $mensaje .= pares_impares($numInt);
                break;
            case 'factorial':
                $mensaje .= factorial($numInt);
                break;
            default:
                $mensaje .= "Error";
        }
    } else {
        foreach ($errores as $error){
            $mensaje.=$error."<br>";
        }
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
<form action="generadorOperacionesNumericas.php" method="post">
    <label for="numero">Numero del 1 al 50</label><br>
    <input type="text" name="numero" id="numero" value="<?=htmlspecialchars($numero)?>">

    <label for="operaciones">Operaciones</label>
    <select name="operaciones" id="operaciones">
        <option value="">-- Selecciona una opcion --</option>
        <option value="tabla">Tabla de multiplicar</option>
        <option value="suma">Suma acumulada</option>
        <option value="pares_impares">Pares e Impares</option>
        <option value="factorial">Calcular factorial</option>
    </select><br><br>

    <button type="submit" name="submit">Calcular</button>
</form>
<hr>
<?=$mensaje?>
</body>
</html>
