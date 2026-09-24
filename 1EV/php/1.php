<!-- Esto tiene que ir en var/www/html para que apache2 funcione -->
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de prueba</title>
</head>
<body>
<h1>Contenido de php</h1>

<!--Lo introducido es codigo PHP-->
<?php
$a = rand(1,10);
echo "<h1>Valor de <span style='color: green'>$a</span> </h1>";
?>
</body>
</html>