<?php
require_once 'controllers/funciones.php';

// inicializar variables por defecto para evitar errores
$msj = "";
$esError = false;
$opcion = $_POST['submit'] ?? "";

// recoger la agenda oculta del formulario
$agenda = isset($_POST['agenda']) ? json_decode($_POST['agenda'], true) : [];
if (!is_array($agenda)) $agenda = [];

// evaluar el boton pulsado por el usuario
switch ($opcion) {
    case "Añadir contacto":
        // recoger los datos en una lista
        list($agenda, $nombre, $telefono) = get_data();

        // validar los datos
        $error = validar_datos($agenda, $nombre, $telefono);

        // si error está vacío, ha ido bien y realizar la acción
        if ($error === "") {
            $msj = realizar_accion($agenda, $nombre, $telefono);
            $esError = false;
        } else {
            // si hay error, se muestra el error, y y error pasa a true
            $msj = $error;
            $esError = true;
        }
        break;

    case "Eliminar contactos":
        // Vaciar cada variable
        $agenda = [];
        $msj = "Se han eliminado los contactos";
        $esError = false;
        break;
}

// DATOS PARA PINTAR POR PANTALLA

// variable booleana que nos dice si hay algún contacto guardado
$hayContactos = count($agenda) > 0;

// cabecera
if ($hayContactos) {
    $textoCabecera = "Hay " . count($agenda) . " contacto(s) en la agenda";
} else {
    $textoCabecera = "No hay contactos en la agenda";
}

// si hay datos en la agenda el boton se activa
$estadoBoton = $hayContactos ? "" : "disabled";

// comprobar si ha habido error o no
$htmlMensaje = "";
if ($msj !== "") {
    // si hubo error, la clase será "mensaje error" (rojo), si no, solo "mensaje" (verde)
    $clase = $esError ? "mensaje error" : "mensaje";
    $htmlMensaje = "<div class=\"$clase\">$msj</div>";
}

// tabla de los contactos
if ($hayContactos) {
    $htmlListaContactos = "<table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>";

    // recorrer el array, $nom es la clave (nombre) y $tel el valor (teléfono).
    foreach ($agenda as $nom => $tel) {
        $nomFor = htmlspecialchars($nom);
        $telFor = htmlspecialchars($tel);
        $htmlListaContactos .= "<tr>
                                    <td><span class=\"variable\">$nomFor</span></td>
                                    <td><span class=\"variable\">$telFor</span></td>
                                </tr>";
    }
    $htmlListaContactos .= "</tbody></table>";
} else {
    $htmlListaContactos = '<p class="variable" style="text-align: center">No hay ningún contacto guardado todavía.</p>';
}

// convertir el array de PHP en un string de texto plano (JSON) para poder meterlo en el input hidden
// Ej: ['Pepe' => '1234'] se convierte en '{"Pepe":"1234"}'
$agendaOculta = json_encode($agenda);

// introducir el archivo HTML.
// Se hace abajo para que todas las variables ya esten cargadas
include 'templates/vista.php';