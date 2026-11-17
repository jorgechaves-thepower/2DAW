<?php
$modulos = ["DWES", "DWEC", "Despliegue"];

$estudiante = [
    "nombre" => "Sergio",
    "curso" => "2º DAW",
    "nota" => 8.2
];

$alumnos = [
    ["nombre" => "Astrid", "nota" => 8.3],
    ["nombre" => "Almudena", "nota" => 8.4],
    ["nombre" => "Sergio", "nota" => 5.1],
    ["nombre" => "Rafa", "nota" => 0.5],
];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title> Arrays en PHP </title>
        <style>
            table { border-collapse: collapse;}
            th, td { border: 1px solid #984; padding: 6px 12px;}
            .suspenso { color: red}
            .aprobado { color: green}
        </style>
    </head>
    <body>
        <h1>Arrays y bucles</h1>
        <h2>Módulos (array indexado)</h2>
        <p>El primer módulo es: <?= $modulos[0] ?></p>
        <p>Hay <?= count($modulos) ?> módulos</p>
        <ul>
            <?php foreach ($modulos as $modulo): ?>
                <li> <?= $modulo ?></li>
            <?php endforeach; ?>
        </ul>
        <h2>Estudiantes (array asociativo)</h2>
        <p>
            <?= $estudiante["nombre"] ?> está en <?= $estudiante["curso"] ?> y tiene una nota de <?= $estudiante["nota"] ?>
        </p>

        <h2> Lista de alumnos (array de arrays) </h2>
        <table>
            <tr><th>Nombre</th><th>Nota</th><th>Resultado</th></tr>
            <?php foreach ($alumnos as $a): ?>
                <tr>
                    <td><?= $a["nombre"] ?></td>
                    <td><?= $a["nota"] ?></td>
                    <?php if ($a["nota"] >= 5): ?>
                        <td class="aprobado">Aprobado</td>
                    <?php else: ?>
                        <td class="suspenso">Suspenso</td>
                    <?php endif ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>