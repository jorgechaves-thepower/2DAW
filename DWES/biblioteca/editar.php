<?php
require "conexion.php";
// El id del libro llega en la URL (editar.php?id=3) o en el formulario (campo oculto)
$id = (int) ($_GET["id"] ?? $_POST["id"] ?? 0);
// ===== 1) BUSCAR EL LIBRO EN LA BASE DE DATOS =====
$consulta = $pdo->prepare("SELECT * FROM libros WHERE id = :id");
$consulta->execute([":id" => $id]);
$libro = $consulta->fetch(); // fetch() trae UNA sola fila (o false si no hay)
if (!$libro) {
    header("Location: index.php?ok=noexiste");
    exit;
}
// Rellenamos el formulario con los datos que ya tenía el libro
$titulo = $libro["titulo"];
$autor = $libro["autor"];
$anio = (string) $libro["anio"];
$genero = $libro["genero"];
$leido = (bool) $libro["leido"];
$errores = [];
// ===== 2) SI SE HA ENVIADO EL FORMULARIO, GUARDAR LOS CAMBIOS =====
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = trim($_POST["titulo"] ?? "");
    $autor = trim($_POST["autor"] ?? "");
    $anio = trim($_POST["anio"] ?? "");
    $genero = $_POST["genero"] ?? "";
    $leido = isset($_POST["leido"]);
    // Misma validación que en nuevo.php
    if ($titulo === "") {
        $errores[] = "El título es obligatorio.";
    }
    if ($autor === "") {
        $errores[] = "El autor es obligatorio.";
    }
    if (!ctype_digit($anio) || (int) $anio < 1000 || (int) $anio > (int) date("Y")) {
        $errores[] = "El año tiene que ser un número entre 1000 y " . date("Y") . ".";
    }
    if (!in_array($genero, $generos)) {
        $errores[] = "Elige un género de la lista.";
    }

    if (count($errores) === 0) {
        // UPDATE: cambia los datos de la fila. ¡El WHERE es imprescindible!
        $sql = "UPDATE libros SET titulo = :titulo, autor = :autor, anio = :anio, genero = :genero, leido = :leido WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":anio" => (int) $anio,
            ":genero" => $genero,
            ":leido" => $leido ? 1 : 0,
            ":id" => $id
        ]);
        header("Location: index.php?ok=editado");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar libro</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Editar libro</h1>
    <?php foreach ($errores as $error): ?>
        <p class="error"><?= $error ?></p>
    <?php endforeach; ?>
    <form action="" method="post" class="ficha">
        <!-- Campo oculto: viaja con el formulario pero el usuario no lo ve -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>">
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($autor) ?>">
        <label for="anio">Año de publicación</label>
        <input type="text" id="anio" name="anio" value="<?= htmlspecialchars($anio) ?>">
        <label for="genero">Género</label>
        <select id="genero" name="genero">
            <option value="">-- Elige uno --</option>
            <?php foreach ($generos as $g): ?>
                <option value="<?= $g ?>" <?= $g === $genero ? "selected" : "" ?>>
                    <?= $g ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>
            <input type="checkbox" name="leido" <?= $leido ? "checked" : "" ?>>
            Ya lo he leído
        </label>
        <button type="submit">Guardar cambios</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>

</html>