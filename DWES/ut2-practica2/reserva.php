<?php
declare(strict_types= 1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

const ALOJAMIENTO = "Casa Rural Ampollas Made In Gymrat";
const PRECIO_DESAYUNO = 8.5;

function formatear(float $euros): string{
    return number_format($euros, 2, ",", "."). ' €';
}

$enviado = $_GET !== [];
$nombre = $_GET['nombre'] ?? '';
$noches = (int) $_GET['noches'] ?? '';
$personas = (int) $_GET['personas'] ??'';
$precio = filter_var($_GET['precio'] ?? '', FILTER_VALIDATE_FLOAT);

if($precio !== false){
    $alojamiento = $noches * $precio;
    $precioDesayuno = 8.5;

    function costeDesayuno($noches, $personas, float $precio = PRECIO_DESAYUNO): float{
        return $noches * $personas * $precio;
    }

    $desayuno = ($_GET['desayuno'] ??'') === '1';
    $extra = 0.0;
    if ($desayuno){
        $extra = costeDesayuno($noches, $personas);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= ALOJAMIENTO ?></h1>
    <form method="get" action="reserva.php">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Noches: <input type="text" name="noches"></p>
        <p>Personas: <input type="text" name="personas"></p>
        <p>Precio por noche (€): <input type="text" name="precio">
        <p>Código de descuento: <input type="text" name="codigo"></p>
        <p><label><input type="checkbox" name="desayuno" value="1">Con desayuno</label></p>
        <p><button type="submit">Calcular</button></p>
    </form>
    <?php if ($enviado): ?>
        <h2>Reserva de <?= $nombre ?></h2>
        <?php if ($precio === false): ?>
            <p>El precio no es válido</p>
        <?php else: ?>
            <p>Alojamiento: <?= $noches ?> noches x <?= formatear($precio) ?> = <?= formatear($alojamiento) ?></p>
            <p>Desayuno: <?= formatear($extra) ?></p>
            <?php endif; ?>
    <?php endif; ?>
</body>
</html>