<?php
/**
 * Con la tecnología conocida hasta ahora debes programar una especie de pequeña agenda según se especifica. (No usar sesiones, ni ficheros, ni bases de datos)
 * Es una aplicación para mantener una pequeña agenda en una única página web programada en PHP.
 * Los valores de la agenda sólo se mantendrán mientras estoy conectado de manera continua con en navegador, cuando reinicie el navegador la agenda empezará vacía.
 * La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono. Además, no podrá haber nombres repetidos en la agenda.
 *
 *
 * En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre y otro para el número de teléfono.
 * Cada vez que se envíe el formulario:
 * Se producirá una advertencia :
 * Si el nombre está vacío
 * Si el teléfono no es numérico
 * Si el teléfono está vacío y en nombre no existe en la agenda
 * Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.
 * Por otro lado cumplirá estos requisitos funcionales:
 *
 *
 * Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
 * Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.
 * Se podrán borrar todos los contactos de la agenda.
 * El botón borrar contactos sólo estará habilitado si hay contactos en la agenda
 * A la hora de desarrollarla sigue el esquema que se plantea en el siguiente diagrama
 */

/**
 * Funcion para obtener los datos del formulario
 * @return array
 */
function get_data(): array{
    $agenda = isset($_POST['agenda']) ? json_decode($_POST['agenda'], true) : [];
    $nombre = htmlspecialchars($_POST['nombre'] ?? "");
    $telefono = htmlspecialchars($_POST['telefono'] ?? "");

    return [$agenda, $nombre, $telefono];
}

/**
 * @param array $agenda
 * @param string $nombre
 * @param string $telefono
 * @return string
 *
 *  Analiza los datos y retorna o "" si todo correcto o mensaje con el error
 *  $nombre = "" => El nombre no puede estar vacio
 *  $telefono no es numero => El telefono tiene que ser numerico
 *  $telefono vacio y nombre no existe en la agenda => No puedo borrar un nombre que no existe
 */
function validar_datos(array $agenda, string $nombre, string $telefono):string{
    $error = "";
    $error .= $nombre == "" ? "El nombre no puede estar vacio <br />" : $error;
    $error .= (!is_numeric($telefono)  && $telefono !== "") ? "El telefono tiene que ser numerico<br />" : $error;
    $error .= ($telefono == "") && !isset($agenda[$nombre]) ? "No puedo borrar $nombre porque no existe en agenda" : $error;

    return $error;
}
/**
 * Funcion para hacer la accion del botón
 * @param array $agenda
 * @param string $nombre
 * @param string $telefono
 * @return string
 */
function realizar_accion(array &$agenda, string $nombre, string $telefono): string {
    if (!isset($agenda[$nombre])) {
        $agenda[$nombre] = $telefono;
        return "Contacto $nombre añadido";
    } else if ($telefono !== "") {
        $agenda[$nombre] = $telefono;
        return "Telefono de $nombre actualizado";
    } else {
        unset($agenda[$nombre]);
        return "Contacto $nombre eliminado";
    }
}


$msj = "";
$error = "";
$opcion = $_POST['submit']??"";

switch ($opcion) {
    case "Añadir contacto":
        list($agenda,$nombre,$telefono) = get_data();
        $error = validar_datos($agenda,$nombre,$telefono);
        $msj = ($error === "") ? realizar_accion($agenda, $nombre, $telefono) : $error;

        var_dump($error);
        var_dump($agenda);
        break;
    case "Eliminar contactos":
        $agenda = [];
        $msj = "Se han eliminado los contactos";
        break;
    default:
        $agenda = [];
        break;
}

$contactosTotal = count($agenda) > 0;
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src='https://unpkg.com/vue'></script>
    <title> Agenda de contactos</title>
</head>
<header>
    Agenda de contactos: Sin contactos</header>
<body>

<!-- Creamos el formulario para insertr los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action=indexAgenda.php method="post">
        <br>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
        <label for="telefono">Teléfono </label><input type="text" name="telefono" size="15"/><br/>
        <input type="submit" value="Añadir contacto" name="submit">
        <input type="submit" value="Eliminar contactos" name="submit" disabled >

        <!-- Metemos los contactos existentes  ocultos en el formulario-->
        <input type="hidden" name="agenda" value='<?php echo json_encode($agenda);?>'>
    </form>
    <div class="mensaje"></div>
</fieldset>
<div style="clear:both ">
    <hr/>
</div>

</body>

</html>