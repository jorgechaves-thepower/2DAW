<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Entorno</title>
    </head>
    <body>
        <h1>Mi entorno de PHP</h1>
        <p>Versión de PHP: <?= PHP_VERSION ?></p>
        <p>Errores visibles: <?= ini_get("display_errors") ?></p>
        <p>Entero más grande (PHP_INT_MAX): <?= PHP_INT_MAX ?></p>
        <?php echo $noExiste ?>
    </body>
</html>