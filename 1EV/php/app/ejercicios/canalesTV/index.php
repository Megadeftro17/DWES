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

$content = file_get_contents($url);
$categorias = json_decode($content, true);

$elegido = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TV</title>
</head>
<body>
    <form action="#" method="get">
        <select name="categoria" id="select" onchange="this.form.submit()">
            <option value="todos">Mostrar todos</option>;
            <?php foreach ($categorias as $seccion){
                $marcado = ($elegido == $seccion['name']) ? "selected" : "";
                echo "<option value='$seccion[name]' $marcado>$seccion[name]</option>";
            }?>
        </select>
    </form>
    <?php
        foreach ($categorias as $seccion){
            echo "<h1>$seccion[name]</h1>";
            $canales  = $seccion['channels'];
            foreach ($canales as $canal) {
                $img = $canal['logo'];
                $name = $canal['name'];
                $link = $canal['web'];

                echo "<a href='$link' target='_blank'><img src='$img' alt='$name' width='80' style='margin:5px;'></a>";
            }
        }
    ?>
</body>
</html>
