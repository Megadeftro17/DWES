<?php
$errores = [];
$agenda = [];
$msg = "";
$agendaHTML = "";

if(isset($_POST['agenda_json'])){
    $agenda = json_decode($_POST['agenda_json'],true) ?? [];
}

if(isset($_POST['submit'])){
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $telefono = trim(htmlspecialchars($_POST['telefono']));

    if(!empty($nombre)) {
        // Si ambos valores están se añade
        if (!empty($telefono)) {
            $agenda[$nombre] = $telefono;
            $msg .= "<h3>Contacto '$nombre' guardado</h3>";
        } else {
            // Si falta el telefono se borra el nombre
            if(isset($agenda[$nombre])){
                unset($agenda[$nombre]);
                $msg .= "<h3>Contacto '$nombre' eliminado</h3>";
            } else {
                $msg .= "<h3>Contacto '$nombre' no existe</h3>";
            }

        }
    } else {
        $msg .= "El nombre es obligatorio";
    }
}

if(empty($agenda)){
    $agendaHTML .= "<p>No hay contactos guardados todavía</p>";
} else {
    $agendaHTML .= "<h3>Contactos agenda (".count($agenda).")</h3>";
    $agendaHTML .= "<table border='1'>";
    $agendaHTML .= "<tr><th>Nombre</th><th>Telefono</th></tr>";
    foreach ($agenda as $nombre => $telefono){
        $agendaHTML .= "<tr>";
        $agendaHTML .= "<td>$nombre</td>";
        $agendaHTML .= "<td>$telefono</td>";
        $agendaHTML .= "</tr>";
    }
    $agendaHTML .= "</table>";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
</head>
<body>
<form action="agenda.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"><br><br>

    <label for="telefono">Telefono</label>
    <input type="number" name="telefono" id="telefono"><br><br>

    <input type="submit" name="submit" value="Enviar">
    <hr>
    <input type="hidden" name="agenda_json" value="<?=htmlspecialchars(json_encode($agenda))?>">
</form>
<?=$msg?>
<hr>
<?=$agendaHTML?>
</body>
</html>
