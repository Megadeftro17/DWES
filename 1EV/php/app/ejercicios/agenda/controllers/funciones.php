<?php
/**
 * Función para obtener los datos enviados por el formulario.
 * @return array Devuelve un array con 3 posiciones: la agenda completa, el nombre y el teléfono.
 */
function get_data(): array {
    // Si existe $_POST['agenda'], decodificar el JSON a un array de PHP.
    // el booleano es vital para que devuelva un array asociativo (clave=>valor) y no un objeto.
    $agenda = isset($_POST['agenda']) ? json_decode($_POST['agenda'], true) : [];

    // Por seguridad, si se manipula el HTML y el JSON no es válido, forzar a que sea un array vacío.
    if (!is_array($agenda))$agenda = [];

    // Variables telefono y nombre
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ""));

    return [$agenda, $nombre,$telefono];
}

/**
 * Función para validar las reglas predefinidas
 * @param array $agenda El array con los contactos actuales.
 * @param string $nombre El nombre introducido.
 * @param string $telefono El teléfono introducido.
 * @return string Devuelve un texto con el error, o un texto vacío ("") si esta es correcto.
 */
function validar_datos(array $agenda, string$nombre, string $telefono): string {$error = "";

    // Si el nombre está vacío
    $error .=$nombre == "" ? "El nombre no puede estar vacio <br />" : "";

    // Si han escrito un teléfono y no es un número
    $error .= (!is_numeric($telefono) &&$telefono !== "") ? "El telefono tiene que ser numerico<br />" : "";

    // Si el teléfono está vacío y el nombre no existe en la agenda
    $error .= ($telefono == "" && !isset($agenda[$nombre])) ? "No puedo borrar $nombre porque no existe en agenda" : "";

    return $error;
}

/**
 * Función para realizar la acción de Alta, Modificación o Baja.
 * "&" en <<&$agenda>> significa "paso por referencia".
 * @param array &$agenda
 * @param string $nombre
 * @param string $telefono
 * @return string Mensaje de éxito de la operación realizada.
 */
function realizar_accion(array &$agenda, string $nombre, string$telefono): string {
    if (!isset($agenda[$nombre])) {
        // Si el nombre no existe en el array, se crea
        $agenda[$nombre] =$telefono;
        return "Contacto $nombre añadido";
    } else if ($telefono !== "") {
        // Si el nombre ya existe y se ha puesto un teléfono nuevo, se sobreescribe
        $agenda[$nombre] =$telefono;
        return "Telefono de $nombre actualizado";
    } else {
        // Si el nombre ya existe y el teléfono está vacío, borrar esa variable del array
        unset($agenda[$nombre]);
        return "Contacto $nombre eliminado";
    }
}