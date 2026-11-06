<?php
// 623 11 70 11
/**
 * Utiliza el fichero JSON de canales de televisión disponible en:
 *
 * https://github.com/MAlejandroR/json_tv
 *
 * Descarga el contenido de tv.json utilizando file_get_contents().
 * Convierte el JSON en un array asociativo con json_decode().
 * Analiza su estructura y recórrelo con foreach.
 * Muestra los canales de televisión, incluyendo su nombre y logotipo.
 */

// URL DEL JSON RAW
$url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json";

// 1. Descarga el texto raw del JSON
$content = file_get_contents($url);

// 2. Transforma esa cadena JSON en un array PHP para poder usarlo fácilmente
$categorias = json_decode($content, true);

$imagenes = "";
$posicion_categoria = "";

if (isset($_POST['btn_submit'])) {
    // 1. Recogemos el valor (índice) que envió el desplegable
    $posicion_categoria = $_POST['categoria_index'];

    // 2. Extraemos solo los canales de esa categoría
    $canales = $categorias[$posicion_categoria]['channels'];

    // 3. Recorremos los canales de esa categoría para crear las imágenes HTML
    $images = "";
    foreach ($canales as $canal) {
        $img = $canal['logo'];
        $url_canal = $canal['web'];
        $name = $canal['name'];

        // Concatenamos el HTML de la imagen con su enlace
        $images .= "<a href='$url_canal'><img src='$img' alt='$name'></a>\n";
    }

    // 4. Guardamos el bloque final en $imagenes
    $imagenes = $images;
}

$opciones = "";
foreach ($categorias as $pos => $cat) {
    $selected = ($posicion_categoria !== "" && $pos == $posicion_categoria) ? "selected" : "";
    $opciones .= "<option $selected value='$pos'>{$cat['name']}</option>\n";
}