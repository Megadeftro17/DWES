<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3">
    <title>Imágenes Aleatorias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            padding-top: 30px;
        }
        .contenedor {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        img {
            max-width: 300px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

<h1>Imágenes Aleatorias (Actualización cada 3 segundos)</h1>

<div class="contenedor">
    <?php
    // Array
    $imagenes = [
        "https://es.wikieducator.org/images/3/3d/Ajax_cliente_servidor.png",
        "https://es.wikieducator.org/images/7/7b/Funcionamiento_ajax.png",
        "https://es.wikieducator.org/images/a/aa/Angular_app_base.png",
        "https://es.wikieducator.org/images/3/3d/Docker_distancia_1.png",
        "https://es.wikieducator.org/images/4/4e/Opcion_Instalar.png",
        "https://es.wikieducator.org/images/a/ab/AplicacionWeb.png",
        "https://es.wikieducator.org/images/e/e4/Red3.png",
        "https://es.wikieducator.org/images/f/f2/DACTW.png",
        "https://es.wikieducator.org/images/e/e5/M3_web.png",
        "https://es.wikieducator.org/images/a/a6/Ficheros.jpeg"
    ];

    // 3 Imagenes aleatorias
    $clavesAleatorias = array_rand($imagenes, 3);

    // Recorrer con foreach
    foreach ($clavesAleatorias as $clave) {
        echo '<img src="' . $imagenes[$clave] . '" alt="Imagen aleatoria de PHP">';
    }
    ?>
</div>

</body>
</html>
