<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi primera página PHP</title>
</head>

<body>
    <h1>Hola desde HTML</h1>
    <?php
        echo "<p>Hola desde PHP</p>";
        echo "<p>Hoy es " . date("d/m/Y") . " y son las " . date("H:i:s") . "</p>";
    ?>
    <p>Recarga la página (F5) y fíjate en cómo cambia la hora.</p>
</body>

</html>