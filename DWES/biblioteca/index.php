<?php
require "conexion.php";

// ===== BUSCADOR =====
// Si la URL trae ?buscar=..., filtramos. Si no, mostramos todos.
$buscar = trim($_GET["buscar"] ?? "");
if ($buscar === "") {
    // Consulta sin datos del usuario: se puede usar query() directamente
    $consulta = $pdo->query("SELECT * FROM libros ORDER BY titulo");
} else {
    // Consulta CON datos del usuario: SIEMPRE consulta preparada
    $consulta = $pdo->prepare(
        "SELECT * FROM libros WHERE titulo LIKE :texto1 OR autor LIKE :texto2 ORDER BY titulo"
    );
    $consulta->execute([
        ":texto1" => "%$buscar%", // % = "cualquier cosa delante o detrás"
        ":texto2" => "%$buscar%"
    ]);
}

// fetchAll() trae TODAS las filas del resultado en un array de arrays
$libros = $consulta->fetchAll();
// ===== MENSAJES DESPUÉS DE AÑADIR / EDITAR / BORRAR =====
$mensajes = [
    "creado" => "Libro añadido correctamente.",
    "editado" => "Libro modificado correctamente.",
    "borrado" => "Libro borrado correctamente.",
    "noexiste" => "Ese libro no existe."
];
$mensaje = $mensajes[$_GET["ok"] ?? ""] ?? "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Mi Biblioteca</h1>
    <?php if ($mensaje !== ""): ?>
        <p class="aviso"><?= $mensaje ?></p>
    <?php endif; ?>
    <div class="barra">
        <form action="" method="get">
            <input type="text" name="buscar" placeholder="Buscar por título o autor"
                value="<?= htmlspecialchars($buscar) ?>">
            <button type="submit">Buscar</button>
            <?php if ($buscar !== ""): ?>
                <a href="index.php">Quitar filtro</a>
            <?php endif; ?>
        </form>
        <a class="boton" href="nuevo.php">+ Añadir libro</a>
    </div>
    <p><?= count($libros) ?> libro(s) encontrado(s)</p>
    <?php if (count($libros) === 0): ?>
        <p>No hay ningún libro que mostrar.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Género</th>
                <th>Leído</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= htmlspecialchars($libro["titulo"]) ?></td>
                    <td><?= htmlspecialchars($libro["autor"]) ?></td>
                    <td><?= $libro["anio"] ?></td>
                    <td><?= htmlspecialchars($libro["genero"]) ?></td>
                    <td><?= $libro["leido"] ? "Sí" : "No" ?></td>
                    <td class="acciones">
                        <a href="editar.php?id=<?= $libro["id"] ?>">Editar</a>
                        <form action="borrar.php" method="post" onsubmit="return confirm('¿Seguro que quieres borrarlo?')">
                            <input type="hidden" name="id" value="<?= $libro["id"] ?>">
                            <button type="submit" class="peligro">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>