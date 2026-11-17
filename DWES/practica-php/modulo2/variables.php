<?php
$nombre = "Astrid";
$edad = 25;
$nota = 7.5;
$aprobado = true;

$edadDentrode5 = $edad + 5;
$notaSobre100 = $nota * 10;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Variables en PHP</title>
    </head>
    <body>
        <p><?php echo "La alumna de DAW se llama $nombre y tiene $edad años"; ?></p>
        <p><?php echo "Dentro de 5 años tendrá " . $edadDentrode5 . " años"; ?></p>
        <p>La nota que tiene es <?= $nota ?> (sobre 100 sería <?= $notaSobre100 ?>).</p>
    </body>

    <?php if ($nota >= 5): ?>
        <p style="color: green;"> Está aprobada </p>
    <?php else: ?>
        <p style="color: red;"> Está suspensa </p>
    <?php endif;; ?>

    <pre><?php var_dump($nombre, $edad, $nota, $aprobado); ?></pre>
</html>