<?php
$tituloSitio = "Jorge";
$colorTema = "#3b82f6";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloSitio; ?> - Docker & Apache</title>
    <style>
        :root {
            --primary-color: <?php echo $colorTema; ?>;
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            line-height: 1.6;
        }

        main {
            background: white;
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.025em;
        }

        p {
            color: var(--text-muted);
            font-size: 1.125rem;
            margin-bottom: 2rem;
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn:focus-visible {
            outline: 3px solid var(--text-main);
            outline-offset: 2px;
        }

        details {
            margin-top: 2.5rem;
            text-align: left;
            background: #f1f5f9;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }

        summary {
            cursor: pointer;
            font-weight: 600;
            color: var(--text-main);
            outline: none;
        }

        summary:focus-visible {
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: 4px;
        }

        .php-info-container {
            margin-top: 1rem;
            max-height: 250px;
            overflow-y: auto;
            font-size: 0.8rem;
            background: white;
            padding: 1rem;
            border-radius: 4px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<main>
    <h1><?php echo htmlspecialchars($tituloSitio); ?></h1>
    <p>El Virtual Host está funcionando correctamente a través del contenedor Docker.</p>

    <button class="btn" onclick="alert('¡Estás en la web de <?php echo htmlspecialchars($tituloSitio); ?>!')">
        Explorar sitio
    </button>

    <details>
        <summary>Mostrar información de PHP</summary>
        <div class="php-info-container">
            <?php
            ob_start();
            phpinfo(INFO_GENERAL | INFO_ENVIRONMENT);
            $info = ob_get_clean();

            $info = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $info);
            echo $info;
            ?>
        </div>
    </details>
</main>

</body>
</html>