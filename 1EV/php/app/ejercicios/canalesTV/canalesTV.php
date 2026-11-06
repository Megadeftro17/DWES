<?php

$url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/refs/heads/main/tv.json";

$content = file_get_contents($url);
$categorias = json_decode($content, true);

$canalElegido = $_POST["submit"] ?? null;

$content = "";
if ($canalElegido != null) {
    foreach ($categorias as $categoria) {
        if ($categoria['name'] == $canalElegido) {
            $content .= "<h2>Cadenas en {$categoria['name']}:</h2>\n";
            foreach ($categoria['channels'] as $canal) {
                $img = $canal['logo'];
                $name = $canal['name'];
                $url = $canal['web'];
                $content .= "<a href='$url'>\n";
                $content .= "<img src='$img' alt='$name' />\n";
                $content .= "</a>\n";
            }
        }
    }
} else {
    $content .= "<h2>Categorías:</h2>\n";
    foreach ($categorias as $canales) {
        $content .= "<form action='tv2.php' method='post'>\n";
        $content .= "<input type='submit' value='{$canales['name']}' name='submit'>\n";
        $content .= "</form>\n";
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
    <title>Cadenas televisivas 2</title>
</head>
<body>
<?= $content ?>
</body>
</html>