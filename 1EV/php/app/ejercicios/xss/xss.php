<?php
if(isset($_POST['submit'])){
    $comentario = $_POST['comentario'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiTienda - Auriculares Pro</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #222;
        }

        header {
            background: #173b65;
            color: white;
            padding: 22px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        nav {
            display: flex;
            gap: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 1050px;
            margin: 50px auto;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px #0001;
        }

        .producto {
            display: flex;
            gap: 45px;
            align-items: flex-start;
        }

        .producto img {
            width: 42%;
            border-radius: 10px;
        }

        .detalle {
            flex: 1;
        }

        .detalle h2 {
            font-size: 32px;
            margin-top: 0;
        }

        .precio {
            font-size: 30px;
            color: #dc2626;
            font-weight: bold;
        }

        button {
            background: #0866c2;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #084b91;
        }

        .comentarios {
            margin-top: 35px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 15px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font: inherit;
            resize: vertical;
        }

        @media (max-width: 700px) {
            header, .producto {
                flex-direction: column;
            }

            .producto img {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header>
    <h1>🛒 MiTienda</h1>

    <nav>
        <a href="#">Inicio</a>
        <a href="#">Productos</a>
        <a href="#">Contacto</a>
    </nav>
</header>

<main>
    <section class="producto">

        <img src="auriculares.png" alt="Auriculares Pro">

        <div class="detalle">
            <h2>Auriculares Pro</h2>

            <p>
                Precio:
                <span id="precio" class="precio">999,00 €</span>
            </p>

            <button type="button">Añadir al carrito</button>

            <section class="comentarios">
                <h3>Comentarios</h3>

                <form action="xss.php" method="post">
    <textarea name="comentario"
              placeholder="Escribe un comentario...">
    </textarea>

                    <button type="submit" name="submit">Publicar</button>
                </form>

                <div class="lista-comentarios">
                    <?=$comentario??""?>
                </div>
            </section>
        </div>

    </section>
</main>

</body>
</html>

