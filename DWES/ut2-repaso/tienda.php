<?php
declare(strict_types= 1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

const TIENDA = "Tienda de DAW";
const IVA = 0.21;

function cabecera(): string {
    return "<h1> Bienvenido a la " . TIENDA . "</h1>";
}

function formatear(float $euros): string {
    return number_format($euros,2,',','.') . " €";
}


$precioURL = str_replace(",",".", $_GET['precio'] ?? '');
$producto = $_GET['producto'] ?? 'Sin nombre';
$precio = filter_var($precioURL, FILTER_VALIDATE_FLOAT);
$uds = filter_var($_GET['uds'] ?? '', FILTER_VALIDATE_INT);
$descuento = filter_var($_GET['descuento'] ??'', FILTER_VALIDATE_INT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>
<body>
    <?= cabecera() ?>
    <?php if ($precio == false || $uds == false) : ?>
        <p> Oye, el precio o las unidades son incorrectas </p>
    <?php else : ?>
        <p>Producto : <?= $producto ?></p>
    <?php endif; ?>
    <p><?= "Precio unidad: {$_GET['precio']}€"?></p>
    <p><?= 'Total: ' . ($uds * $precio) .' €' ?></p>
    <?php if($descuento === false): ?>
        <p>Descuento no válido</p>
    <?php else : ?>
        <p> Descuento: <?= $descuento ?>% </p>
    <?php endif; ?>
    <p>Total con IVA: <?php echo formatear($uds * $precio * (1 - $descuento / 100) * (1 + IVA)) ?></p>
    <?php if ($_GET['urgente'] == 1): ?>
        <p>Envío urgente</p>
    <?php endif; ?>
</body>
</html>
