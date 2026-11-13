<?php
/**
 * Esto es un bloque "PHPDoc". No ejecuta código, pero le chiva a tu editor (PhpStorm/VSCode)
 * que estas variables van a existir porque vienen inyectadas desde el indexAgenda.php.
 * Así dejan de salirte los subrayados rojos de "Undefined variable".
 *
 * @var string $textoCabecera
 * @var string $estadoBoton
 * @var string $agendaOculta
 * @var string $htmlMensaje
 * @var string $htmlListaContactos
 */
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Agenda de contactos</title>
</head>
<body>

<header>
    <!-- Imprime el texto de la cabecera generado en el index -->
    <?= $textoCabecera ?>
</header>

<!-- Formulario -->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action="" method="post">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" size="15"/><br/>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" size="15"/><br/>

        <input type="submit" value="Añadir contacto" name="submit">
        <input type="submit" value="Eliminar contactos" name="submit" <?= $estadoBoton ?>>

        <input type="hidden" name="agenda" value='<?= $agendaOculta ?>'>
    </form>

    <?= $htmlMensaje ?>
</fieldset>

<!-- Listado de contactos -->
<div class="listado_contactos">
    <div class="center">Lista de la Agenda</div>

    <?= $htmlListaContactos ?>
</div>

<div style="clear:both">
    <hr/>
</div>

</body>
</html>