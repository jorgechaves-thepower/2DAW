<?php
function calcularMedia ($notas) {
    $suma = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
    }
    
    return $suma / count($notas);
}

$numero = 7;
$notas = [6, 8.2, 3.1, 2.9, 10];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bucles y funciones</title>
</head>
<body>
    <h1>Tabla de multiplicar del número <?= $numero ?></h1>
    <ul>
        <?php for ($i = 0; $i <= 10; $i++) : ?>
            <li><?= $numero ?> x <?= $i ?> = <?= $numero * $i ?></li>
        <?php endfor; ?>
    </ul>

    <h2>Función calcularMedia</h2>
    <p>Notas: <?= implode (", ", $notas) ?></p>
    <p>Media: <?= round(calcularMedia($notas), 2) ?></p>
</body>
</html>
